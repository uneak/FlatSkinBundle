<?php


	namespace Uneak\FlatSkinBundle\Form\Transformer;

	use Symfony\Component\Form\Exception\TransformationFailedException;
	use Symfony\Component\Form\Exception\UnexpectedTypeException;
	use Symfony\Component\Form\Extension\Core\DataTransformer\BaseDateTimeTransformer;

	/**
	 * Transforms between a normalized time and a localized time string.
	 *
	 * @author Bernhard Schussek <bschussek@gmail.com>
	 * @author Florian Eckerstorfer <florian@eckerstorfer.org>
	 */
	class DateTimeToPickerTransformer extends BaseDateTimeTransformer {

		private static $pickerFormater = array("yyyy", "yyyy", "ss", "ii", "hh", "HH", "dd", "mm", "MM", "yy", "p", "P", "s", "i", "h", "H", "d", "m", "M");
		private static $intlFormater = array("y", "yyyy", "ss", "mm", "HH", "hh", "dd", "MM", "MMMM", "yy", "a", "a", "s", "m", "H", "h", "d", "M", "MMM");

		private $dateFormat;
		private $timeFormat;
		private $pattern;
		private $calendar;


		/**
		 * Constructor.
		 *
		 * @see BaseDateTimeTransformer::formats for available format options
		 *
		 * @param string $inputTimezone  The name of the input timezone
		 * @param string $outputTimezone The name of the output timezone
		 * @param int    $dateFormat     The date format
		 * @param int    $timeFormat     The time format
		 * @param int    $calendar       One of the \IntlDateFormatter calendar constants
		 * @param string $pattern        A pattern to pass to \IntlDateFormatter
		 *
		 * @throws UnexpectedTypeException If a format is not supported or if a timezone is not a string
		 */
		public function __construct($inputTimezone = null, $outputTimezone = null, $dateFormat = null, $timeFormat = null, $calendar = \IntlDateFormatter::GREGORIAN, $pattern = null) {
			parent::__construct($inputTimezone, $outputTimezone);

			if (null === $dateFormat) {
				$dateFormat = \IntlDateFormatter::MEDIUM;
			}

			if (null === $timeFormat) {
				$timeFormat = \IntlDateFormatter::SHORT;
			}

			if (!in_array($dateFormat, self::$formats, true)) {
				throw new UnexpectedTypeException($dateFormat, implode('", "', self::$formats));
			}

			if (!in_array($timeFormat, self::$formats, true)) {
				throw new UnexpectedTypeException($timeFormat, implode('", "', self::$formats));
			}

			$this->dateFormat = $dateFormat;
			$this->timeFormat = $timeFormat;
			$this->calendar = $calendar;
			$this->pattern = $pattern;
		}

		/**
		 * Transforms a normalized date into a localized date string/array.
		 *
		 * @param \DateTime $dateTime Normalized date.
		 *
		 * @return string|array Localized date string/array.
		 *
		 * @throws TransformationFailedException If the given value is not an instance
		 *                                       of \DateTime or if the date could not
		 *                                       be transformed.
		 */
		public function transform($dateTime) {
			if (null === $dateTime) {
				return '';
			}

//			ld("transform");
//			ld($dateTime);


			if (!$dateTime instanceof \DateTime) {
				throw new TransformationFailedException('Expected a \DateTime.');
			}

			// convert time to UTC before passing it to the formatter
			$dateTime = clone $dateTime;
			if ('UTC' !== $this->inputTimezone) {
				$dateTime->setTimezone(new \DateTimeZone('UTC'));
			}

			$value = $this->getIntlDateFormatter()->format((int)$dateTime->format('U'));

			if (intl_get_error_code() != 0) {
				throw new TransformationFailedException(intl_get_error_message());
			}

			return $value;
		}

		/**
		 * Transforms a localized date string/array into a normalized date.
		 *
		 * @param string|array $value Localized date string/array
		 *
		 * @return \DateTime Normalized date
		 *
		 * @throws TransformationFailedException if the given value is not a string,
		 *                                       if the date could not be parsed or
		 *                                       if the input timezone is not supported
		 */
		public function reverseTransform($value) {

			ld("reverseTransform");
			ldd($value);

			if (!is_string($value)) {
				throw new TransformationFailedException('Expected a string.');
			}

			if ('' === $value) {
				return;
			}



			$timestamp = $this->getIntlDateFormatter()->parse($value);

			if (intl_get_error_code() != 0) {
				throw new TransformationFailedException(intl_get_error_message());
			}

			try {
				// read timestamp into DateTime object - the formatter delivers in UTC
				$dateTime = new \DateTime(sprintf('@%s UTC', $timestamp));
			} catch (\Exception $e) {
				throw new TransformationFailedException($e->getMessage(), $e->getCode(), $e);
			}

			if ('UTC' !== $this->inputTimezone) {
				try {
					$dateTime->setTimezone(new \DateTimeZone($this->inputTimezone));
				} catch (\Exception $e) {
					throw new TransformationFailedException($e->getMessage(), $e->getCode(), $e);
				}
			}

			ldd($dateTime);

			return $dateTime;
		}

		/**
		 * Returns a preconfigured IntlDateFormatter instance.
		 *
		 * @return \IntlDateFormatter
		 *
		 * @throws TransformationFailedException in case the date formatter can not be constructed.
		 */
		protected function getIntlDateFormatter() {
			$dateFormat = $this->dateFormat;
			$timeFormat = $this->timeFormat;
			$timezone = $this->outputTimezone;
			$calendar = $this->calendar;
			//			$pattern = $this->pattern;

			$pattern = $this->convertPickerToIntlFormater($this->pattern);


			$intlDateFormatter = new \IntlDateFormatter(\Locale::getDefault(), $dateFormat, $timeFormat, $timezone, $calendar, $pattern);

			// new \intlDateFormatter may return null instead of false in case of failure, see https://bugs.php.net/bug.php?id=66323
			if (!$intlDateFormatter) {
				throw new TransformationFailedException(intl_get_error_message(), intl_get_error_code());
			}

			$intlDateFormatter->setLenient(false);

			return $intlDateFormatter;
		}




		/**
		 * Convert the PHP date format to Bootstrap Datetimepicker date format
		 */
		public static function convertIntlFormaterToPicker($formatter) {
			$intlToPicker = array_combine(self::$intlFormater, self::$pickerFormater);
			$patterns = preg_split('([\\\/.:_;,\s-\ ]{1})', $formatter);
			$exits = array();
			foreach ($patterns as $val) {
				if (isset($intlToPicker[$val])) {
					$exits[$val] = $intlToPicker[$val];
				} else {
					// it can throw an Exception
					$exits[$val] = $val;
				}
			}

			return str_replace(array_keys($exits), array_values($exits), $formatter);
		}

		/**
		 * Convert the Bootstrap Datetimepicker date format to PHP date format
		 */
		public static function convertPickerToIntlFormater($formatter) {
			$pickerToIntl = array_combine(self::$pickerFormater, self::$intlFormater);
			$patterns = preg_split('([\\\/.:_;,\s-\ ]{1})', $formatter);
			$exits = array();
			foreach ($patterns as $val) {
				if (isset($pickerToIntl[$val])) {
					$exits[$val] = $pickerToIntl[$val];
				} else {
					// it can throw an Exception
					$exits[$val] = $val;
				}
			}

			return str_replace(array_keys($exits), array_values($exits), $formatter);
		}



	}
