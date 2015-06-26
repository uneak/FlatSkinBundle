<?php

	namespace Uneak\FlatSkinBundle\Form;

	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\Form\FormEvent;
	use Symfony\Component\Form\FormEvents;
	use Symfony\Component\Form\FormInterface;
	use Symfony\Component\Form\FormView;
	use Symfony\Component\OptionsResolver\OptionsResolverInterface;
	use Symfony\Component\Validator\Constraints\Collection;
	use Uneak\AssetsManagerBundle\Assets\AssetBuilder;
	use Uneak\AssetsManagerBundle\Assets\Js\AssetExternalJs;
	use Uneak\AssetsManagerBundle\Assets\Js\AssetInternalJs;
	use Uneak\FormsManagerBundle\Forms\AssetsComponentType;

	class CKEditorType extends AssetsComponentType {


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


		public function buildAsset(AssetBuilder $builder, $parameters) {

			$builder
				->add("ckeditor_js", new AssetExternalJs(), array(
					"src" => "/vendor/ckeditor/ckeditor.js"
				))
				->add("script_ckeditor", new AssetInternalJs(), array(
					"template" => "UneakFlatSkinBundle:Form:ckeditor/ckeditor_script.html.twig",
					"parameters" => array('item' => $parameters)
				));

		}

		//		public function getTheme() {
		//			return "UneakFlatSkinBundle:Form:location_picker/location_picker.html.twig";
		//		}

		public function getParent() {
			return 'textarea';
		}

		public function getName() {
			return 'ckeditor';
		}

	}
