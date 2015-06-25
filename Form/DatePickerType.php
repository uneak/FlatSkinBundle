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
	use Uneak\AssetsManagerBundle\Assets\AssetExternalCss;
	use Uneak\AssetsManagerBundle\Assets\AssetExternalJs;
	use Uneak\AssetsManagerBundle\Assets\AssetInternalJs;
	use Uneak\AdminBundle\Form\AssetsAbstractType;
	use Uneak\FlatSkinBundle\Form\Transformer\DateTimeToPickerTransformer;

	class DatePickerType extends AssetsAbstractType {

		private $_formatConvertRules = array(
			// year
			'yyyy'  => 'YYYY', 'yy' => 'YY', 'y' => 'YYYY',
			// month
			// 'MMMM'=>'MMMM', 'MMM'=>'MMM', 'MM'=>'MM',
			// day
			'dd'    => 'DD', 'd' => 'D',
			// hour
			// 'HH'=>'HH', 'H'=>'H', 'h'=>'h', 'hh'=>'hh',
			// am/pm
			// 'a' => 'a',
			// minute
			// 'mm'=>'mm', 'm'=>'m',
			// second
			// 'ss'=>'ss', 's'=>'s',
			// day of week
			'EE'    => 'ddd', 'EEEEEE' => 'dd',
			// timezone
			'ZZZZZ' => 'Z', 'ZZZ' => 'ZZ',
			// letter 'T'
			'\'T\'' => 'T',
		);


		private static $defaultFormat = "dd/MM/yyyy HH:mm";


		public function buildView(FormView $view, FormInterface $form, array $options) {

			$options['options']["format"] = strtr($options['format'], $this->_formatConvertRules);


			//			if (!isset($pickerOptions['language'])) {
			//				$pickerOptions['language'] = \Locale::getDefault();
			//			}

			//			if(!isset($options['format'])) {
			//				$options['format'] = self::$defaultFormat;
			//			}
			//
			//			if ($options['formatter'] == 'php'){
			//				$options['format'] = self::convertIntlFormaterToMalot( $options['format'] );
			//			}


			//			if ($options['html5'] && self::HTML5_FORMAT === $options['format']) {
			//				$view->vars['type'] = 'datetime';
			//			}

			//			$view->vars['markup'] = $options['markup'];
			$view->vars['widget'] = "single_text";
			$view->vars['options'] = $options['options'];
		}


		public function setDefaultOptions(OptionsResolverInterface $resolver) {

			//			$resolver->setRequired(array('markup'));
			//			$resolver->setAllowedValues('markup', array('input', 'component', 'date-range', 'embedded'));

			$resolver->setDefaults(array(
				'widget'  => 'single_text',
				'format'  => self::$defaultFormat,
				'options' => array(),
			));

			$resolver->setDefined(
				array(
					'options',
				)
			);

		}


		public function getTheme() {
			return "UneakFlatSkinBundle:Form:date_picker/date_picker.html.twig";
		}


		protected function _registerAssets(FormView $formView) {
			$script = array();
			$script["moment_js"] = new AssetExternalJs("/vendor/moment/moment.js");

			if (isset($formView->vars["options"]["locale"])) {
				$script["moment_language_js"] = new AssetExternalJs("/vendor/moment/locale/" . $formView->vars["options"]["locale"] . ".js", array("moment_js"), "", "text/javascript", "script", "UTF-8");
				$script["bootstrap_datepicker_js"] = new AssetExternalJs("/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.js", array("moment_language_js"));
			} else {
				$script["bootstrap_datepicker_js"] = new AssetExternalJs("/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.js", array("moment_js"));
			}

			$script["bootstrap_datetimepicker_js"] = new AssetExternalJs("/vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js", array("bootstrap_datepicker_js"));
			$script["bootstrap_datetimepicker_css"] = new AssetExternalCss("/vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css", null, "", "stylesheet");

			$script["script_datetimepicker"] = new AssetInternalJs("UneakFlatSkinBundle:Form:date_picker/date_picker_script.html.twig", null, array('item' => $formView));

			return $script;
		}


		public function getParent() {
			return 'datetime';
		}

		public function getName() {
			return 'date_picker';
		}

	}
