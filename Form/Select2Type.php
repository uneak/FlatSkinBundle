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

	class Select2Type extends AssetsAbstractType {


		public function buildView(FormView $view, FormInterface $form, array $options) {
			$view->vars['options'] = $options['options'];
		}


		public function setDefaultOptions(OptionsResolverInterface $resolver) {

			$resolver->setDefaults(array(
				'options' => array(),
			));

			$resolver->setDefined(
				array(
					'options',
				)
			);
		}


		public function getTheme() {
			return "UneakFlatSkinBundle:Form:select2/select2.html.twig";
		}


		protected function _registerExternalFile(FormView $formView) {
			$script = array();
			$script["select2_js"] = new ExternalJs("/vendor/select2/select2.js");

			if (isset($formView->vars["options"]["language"])) {
				$script["select2_language_js"] = new ExternalJs("/vendor/select2/select2_locale_" . $formView->vars["options"]["language"] . ".js", array("select2_js"), "", "text/javascript", "script", "UTF-8");
			}

			$script["select2_css"] = new ExternalCss("/vendor/select2/select2.css", null, "", "stylesheet");
			$script["select2_bootstrap_css"] = new ExternalCss("/vendor/select2-bootstrap-css/select2-bootstrap.css", array("select2_css"), "", "stylesheet");

			return $script;
		}


		protected function _registerScript(FormView $formView) {
			$script = array();
			$script["script_select2"] = new ScriptFileTemplateJs("UneakFlatSkinBundle:Form:select2/select2_script.html.twig", null, array('item' => $formView));

			return $script;
		}


		public function getParent() {
			return 'choice';
		}

		public function getName() {
			return 'select2';
		}

	}
