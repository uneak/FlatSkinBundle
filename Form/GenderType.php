<?php

	namespace Uneak\FlatSkinBundle\Form;

	use Symfony\Component\Form\FormInterface;
	use Symfony\Component\Form\FormView;
	use Symfony\Component\OptionsResolver\OptionsResolverInterface;
	use Symfony\Component\Validator\Constraints\Collection;
	use Uneak\AdminBundle\Assets\ExternalCss;
	use Uneak\AdminBundle\Assets\ExternalJs;
	use Uneak\AdminBundle\Assets\ScriptFileTemplateJs;
	use Uneak\AdminBundle\Form\AssetsAbstractType;

	class GenderType extends AssetsAbstractType {

		public function setDefaultOptions(OptionsResolverInterface $resolver) {
			$resolver->setDefaults(array(
				'choices' => array(
					'homme' => 'Homme',
					'femme' => 'Femme',
				)
			));
		}

		public function buildView(FormView $view, FormInterface $form, array $options) {
			parent::buildView($view, $form, $options);
			if (array_key_exists('choices', $options)) {
				$view->vars['choicess'] = $options['choices'];
			}
		}

		public function getTheme() {
			return "UneakFlatSkinBundle:Form:gender/gender.html.twig";
		}

		public function getParent() {
			return 'choice';
		}

		public function getName() {
			return 'gender';
		}

	}
