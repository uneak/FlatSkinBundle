<?php

	namespace Uneak\FlatSkinBundle\Form;

	use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToLocalizedStringTransformer;
	use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToRfc3339Transformer;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\Form\FormEvent;
	use Symfony\Component\Form\FormEvents;
	use Symfony\Component\Form\FormInterface;
	use Symfony\Component\Form\FormView;
	use Symfony\Component\OptionsResolver\OptionsResolverInterface;
	use Symfony\Component\Translation\TranslatorInterface;
	use Symfony\Component\Validator\Constraints\Collection;
	use Uneak\AssetsManagerBundle\Assets\AssetBuilder;
	use Uneak\AssetsManagerBundle\Assets\Css\AssetExternalCss;
	use Uneak\AssetsManagerBundle\Assets\Js\AssetExternalJs;
	use Uneak\AssetsManagerBundle\Assets\Js\AssetInternalJs;
	use Uneak\FlatSkinBundle\Form\Transformer\DateTimeToPickerTransformer;
	use Uneak\FormsManagerBundle\Forms\AssetsComponentType;
	use Vich\UploaderBundle\Form\DataTransformer\FileTransformer;
	use Vich\UploaderBundle\Handler\UploadHandler;
	use Vich\UploaderBundle\Storage\StorageInterface;

	class FilePickerType extends AssetsComponentType {


		public function setDefaultOptions(OptionsResolverInterface $resolver) {
			$resolver->setDefaults(array(
			));
		}

		/**
		 * {@inheritdoc}
		 */
		public function buildForm(FormBuilderInterface $builder, array $options) {

		}


		/**
		 * {@inheritdoc}
		 */
		public function buildView(FormView $view, FormInterface $form, array $options) {

		}


		public function getTheme() {
			return "UneakFlatSkinBundle:Form:file_picker/file_picker.html.twig";
		}


		public function buildAsset(AssetBuilder $builder, $parameters) {

			$builder
				->add("jquery_ui_widget_js", new AssetExternalJs(), array(
					"src" => "/vendor/jquery-file-upload/js/vendor/jquery.ui.widget.js"
				))
				->add("jquery_iframe_transport_js", new AssetExternalJs(), array(
					"src" => "/vendor/jquery-file-upload/js/jquery.iframe-transport.js",
					"dependencies" => array("jquery_ui_widget_js")
				))
				->add("jquery_fileupload_js", new AssetExternalJs(), array(
					"src" => "/vendor/jquery-file-upload/js/jquery.fileupload.js",
					"dependencies" => array("jquery_iframe_transport_js")
				))
				->add("jquery_fileupload_css", new AssetExternalCss(), array(
					"href" => "/vendor/jquery-file-upload/css/jquery.fileupload.css"
				))
				->add("jquery_fileupload_ui_css", new AssetExternalCss(), array(
					"href" => "/vendor/jquery-file-upload/css/jquery.fileupload-ui.css",
					"dependencies" => array("jquery_fileupload_css")
				))
				->add("script_filepicker", new AssetInternalJs(), array(
					"template" => "UneakFlatSkinBundle:Form:file_picker/file_picker_script.html.twig",
					"parameters" => array('item' => $parameters)
				));

		}




		public function getName() {
			return 'file_picker';
		}

	}
