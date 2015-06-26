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
	use Uneak\AssetsManagerBundle\Assets\AssetExternalCss;
	use Uneak\AssetsManagerBundle\Assets\AssetExternalJs;
	use Uneak\AssetsManagerBundle\Assets\AssetInternalJs;
	use Uneak\AdminBundle\Form\AssetsAbstractType;
	use Uneak\FlatSkinBundle\Form\DataTransformer\StringToJsonArrayTransformer;
	use Uneak\FlatSkinBundle\Form\Transformer\DateTimeToPickerTransformer;

	class CKEditorType extends AssetsAbstractType {


		public function buildForm(FormBuilderInterface $builder, array $options) {

		}


		public function buildView(FormView $view, FormInterface $form, array $options) {

			$view->vars['options'] = $options['options'];

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


//		public function getTheme() {
//			return "UneakFlatSkinBundle:Form:location_picker/location_picker.html.twig";
//		}


		protected function _registerAssets(array &$assets, $parameters = null) {

            $assets["ckeditor_js"] = new AssetExternalJs(array(
                "src" => "/vendor/ckeditor/ckeditor.js"
            ));

            $assets["script_ckeditor"] = new AssetInternalJs(array(
                "template" => "UneakFlatSkinBundle:Form:ckeditor/ckeditor_script.html.twig",
                "parameters" => array('item' => $parameters)
            ));

		}


		public function getParent() {
			return 'textarea';
		}

		public function getName() {
			return 'ckeditor';
		}

	}
