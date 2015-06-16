<?php

	namespace Uneak\FlatSkinBundle\Form;

	use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToLocalizedStringTransformer;
	use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToRfc3339Transformer;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\Form\FormEvent;
	use Symfony\Component\Form\FormEvents;
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
	use Uneak\FlatSkinBundle\Form\DataTransformer\StringToJsonArrayTransformer;
	use Uneak\FlatSkinBundle\Form\Transformer\DateTimeToPickerTransformer;

	class LocationPickerType extends AssetsAbstractType {


		public function buildForm(FormBuilderInterface $builder, array $options) {

			$builder->addModelTransformer(new StringToJsonArrayTransformer());

		}


		public function buildView(FormView $view, FormInterface $form, array $options) {

			$view->vars['options'] = $options['options'];

			$value = json_decode($view->vars['value']);
//			ldd($value);
			$view->vars['options']['location'] = array(
				'latitude' => $value->latitude,
				'longitude' => $value->longitude,
			);



		}


		public function setDefaultOptions(OptionsResolverInterface $resolver) {

			$resolver->setDefaults(array(
				'options' => array(),
				'compound' => false
			));

			$resolver->setDefined(
				array(
					'options',
				)
			);

		}


		public function getTheme() {
			return "UneakFlatSkinBundle:Form:location_picker/location_picker.html.twig";
		}


		protected function _registerExternalFile(FormView $formView) {
			$script = array();
			$script["google_map_js"] = new ExternalJs("http://maps.google.com/maps/api/js?sensor=false&libraries=places");
			$script["locationpicker_js"] = new ExternalJs("/vendor/jquery-locationpicker-plugin/dist/locationpicker.jquery.js", array("google_map_js"));

			return $script;
		}


		protected function _registerScript(FormView $formView) {
			$script = array();
			$script["script_locationpicker"] = new ScriptFileTemplateJs("UneakFlatSkinBundle:Form:location_picker/location_picker_script.html.twig", null, array('item' => $formView));

			return $script;
		}


		public function getName() {
			return 'location_picker';
		}

	}
