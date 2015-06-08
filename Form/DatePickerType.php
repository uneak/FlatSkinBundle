<?php

	namespace Uneak\FlatSkinBundle\Form;

	use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToLocalizedStringTransformer;
	use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToRfc3339Transformer;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\Form\FormInterface;
	use Symfony\Component\Form\FormView;
	use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
	use Symfony\Component\OptionsResolver\Options;
	use Symfony\Component\OptionsResolver\OptionsResolverInterface;
	use Symfony\Component\Validator\Constraints\Collection;
	use Uneak\AdminBundle\Assets\ExternalCss;
	use Uneak\AdminBundle\Assets\ExternalJs;
	use Uneak\AdminBundle\Assets\ScriptFileTemplateJs;
	use Uneak\AdminBundle\Form\AssetsAbstractType;
	use Uneak\FlatSkinBundle\Form\Transformer\DateTimeToPickerTransformer;

	class DatePickerType extends AssetsAbstractType {

		private static $malotFormater = array("yyyy", "yyyy", "ss", "ii", "hh", "HH", "dd", "mm", "MM",   "yy", "p", "P", "s", "i", "h", "H", "d", "m", "M");
		private static $intlFormater  = array("y", "yyyy", "ss", "mm", "HH", "hh", "dd", "MM", "MMMM", "yy", "a", "a", "s", "m", "H", "h", "d", "M", "MMM");

		private static $defaultFormat = "dd/mm/yyyy HH:ii";


		public function buildView(FormView $view, FormInterface $form, array $options) {

			$pickerOptions = $options['options'];

			if (!isset($pickerOptions['language'])) {
				$pickerOptions['language'] = \Locale::getDefault();
			}

			if(!isset($pickerOptions['format'])) {
				$pickerOptions['format'] = self::$defaultFormat;
			}

			if ($pickerOptions['formatter'] == 'php'){
				$pickerOptions['format'] = self::convertIntlFormaterToMalot( $pickerOptions['format'] );
			}


//			if ($options['html5'] && self::HTML5_FORMAT === $options['format']) {
//				$view->vars['type'] = 'datetime';
//			}

			$view->vars['markup'] = $options['markup'];
			$view->vars['widget'] = "single_text";
			$view->vars['options'] = $pickerOptions;
		}


		public function setDefaultOptions(OptionsResolverInterface $resolver) {

			$resolver->setRequired(array('markup'));
			$resolver->setAllowedValues('markup', array('input', 'component', 'date-range', 'embedded'));

			$resolver->setDefaults(array(
				'widget' => 'single_text',
				'markup'         => 'input',
				'format' => function (Options $options, $value) {
					$pickerOptions = $options['options'];
					if ($pickerOptions['formatter'] == 'php'){
						if (isset($pickerOptions['format'])){
							return $pickerOptions['format'];
						} else {
							return self::$defaultFormat;
						}
					} elseif ($pickerOptions['formatter'] == 'js'){
						if (isset($pickerOptions['format'])){
							return self::convertMalotToIntlFormater( $pickerOptions['format'] );
						} else {
							return self::convertMalotToIntlFormater( self::$defaultFormat );
						}
					}
				},
				'options'        => array(),

			));

			$resolver->setDefined(
				array(
					'markup',
					'options',
					//					'options' => array(
					//						'autoclose',
					//						'beforeShowDay',
					//						'beforeShowMonth',
					//						'calendarWeeks',
					//						'clearBtn',
					//						'toggleActive',
					//						'container',
					//						'daysOfWeekDisabled',
					//						'daysOfWeekHighlighted',
					//						'datesDisabled',
					//						'defaultViewDate',
					//						'endDate',
					//						'forceParse',
					//						'format',
					//						'inputs',
					//						'keyboardNavigation',
					//						'language',
					//						'minViewMode',
					//						'maxViewMode',
					//						'multidate',
					//						'multidateSeparator',
					//						'orientation',
					//						'startDate',
					//						'startView',
					//						'todayBtn',
					//						'todayHighlight',
					//						'weekStart',
					//						'showOnFocus',
					//						'disableTouchKeyboard',
					//						'enableOnReadonly',
					//						'immediateUpdates',
					//					),
				)
			);

		}



		/**
		 * Convert the PHP date format to Bootstrap Datetimepicker date format
		 */
		public static function convertIntlFormaterToMalot($formatter)
		{
			$intlToMalot = array_combine(self::$intlFormater, self::$malotFormater);
			$patterns = preg_split('([\\\/.:_;,\s-\ ]{1})', $formatter);
			$exits = array();
			foreach ($patterns as $val) {
				if (isset($intlToMalot[$val])){
					$exits[$val] = $intlToMalot[$val];
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
		public static function convertMalotToIntlFormater($formatter)
		{
			$malotToIntl = array_combine(self::$malotFormater, self::$intlFormater);
			$patterns = preg_split('([\\\/.:_;,\s-\ ]{1})', $formatter);
			$exits = array();
			foreach ($patterns as $val) {
				if (isset($malotToIntl[$val])){
					$exits[$val] = $malotToIntl[$val];
				} else {
					// it can throw an Exception
					$exits[$val] = $val;
				}
			}
			return str_replace(array_keys($exits), array_values($exits), $formatter);
		}





		public function getTheme() {
			return "UneakFlatSkinBundle:Form:date_picker/date_picker.html.twig";
		}


		protected function _registerExternalFile(FormView $formView) {
			$script = array();
			$script["bootstrap_jsdatepicker_js"] = new ExternalJs("/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.js");
			$script["bootstrap_jsdatepicker_language_js"] = new ExternalJs("/vendor/bootstrap-datepicker/dist/locales/bootstrap-datepicker." . $formView->vars["options"]["language"] . ".min.js", array("bootstrap_jsdatepicker_js"), "", "text/javascript", "script", "UTF-8");
			$script["bootstrap_jsdatepicker_css"] = new ExternalCss("/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css", null, "", "stylesheet");

			return $script;
		}


		protected function _registerScript(FormView $formView) {
			$script = array();
			$script["script_date_picker"] = new ScriptFileTemplateJs("UneakFlatSkinBundle:Form:date_picker/date_picker_script.html.twig", null, array('item' => $formView));

			return $script;
		}


		public function getParent() {
			return 'datetime';
		}

		public function getName() {
			return 'date_picker';
		}

	}
