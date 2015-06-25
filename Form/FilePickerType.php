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
	use Symfony\Component\Translation\TranslatorInterface;
	use Symfony\Component\Validator\Constraints\Collection;
	use Uneak\AssetsManagerBundle\Assets\AssetExternalCss;
	use Uneak\AssetsManagerBundle\Assets\AssetExternalJs;
	use Uneak\AssetsManagerBundle\Assets\AssetInternalJs;
	use Uneak\AdminBundle\Form\AssetsAbstractType;
	use Uneak\FlatSkinBundle\Form\DataTransformer\StringToJsonArrayTransformer;
	use Uneak\FlatSkinBundle\Form\Transformer\DateTimeToPickerTransformer;
	use Vich\UploaderBundle\Form\DataTransformer\FileTransformer;
	use Vich\UploaderBundle\Handler\UploadHandler;
	use Vich\UploaderBundle\Storage\StorageInterface;

	class FilePickerType extends AssetsAbstractType {


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


		protected function _registerExternalFile(FormView $formView) {
			$script = array();

			$script["jquery_ui_widget_js"] = new AssetExternalJs("/vendor/jquery-file-upload/js/vendor/jquery.ui.widget.js");
			$script["jquery_iframe_transport_js"] = new AssetExternalJs("/vendor/jquery-file-upload/js/jquery.iframe-transport.js", array("jquery_ui_widget_js"));
			$script["jquery_fileupload_js"] = new AssetExternalJs("/vendor/jquery-file-upload/js/jquery.fileupload.js", array("jquery_iframe_transport_js"));

			$script["jquery_fileupload_css"] = new AssetExternalCss("/vendor/jquery-file-upload/css/jquery.fileupload.css", null, "", "stylesheet");
			$script["jquery_fileupload_ui_css"] = new AssetExternalCss("/vendor/jquery-file-upload/css/jquery.fileupload-ui.css", array("jquery_fileupload_css"), "", "stylesheet");


			$script["script_filepicker"] = new AssetInternalJs("UneakFlatSkinBundle:Form:file_picker/file_picker_script.html.twig", null, array('item' => $formView));

			return $script;
		}


		public function getName() {
			return 'file_picker';
		}

	}
