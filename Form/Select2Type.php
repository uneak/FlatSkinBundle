<?php

	namespace Uneak\FlatSkinBundle\Form;

	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\Form\FormEvent;
	use Symfony\Component\Form\FormEvents;
	use Symfony\Component\Form\FormInterface;
	use Symfony\Component\Form\FormView;
	use Symfony\Component\OptionsResolver\OptionsResolverInterface;
	use Symfony\Component\PropertyAccess\PropertyAccess;
	use Symfony\Component\Validator\Constraints\Collection;
	use Uneak\AssetsManagerBundle\Assets\AssetBuilder;
	use Uneak\AssetsManagerBundle\Assets\Css\AssetExternalCss;
	use Uneak\AssetsManagerBundle\Assets\Js\AssetExternalJs;
	use Uneak\AssetsManagerBundle\Assets\Js\AssetInternalJs;
	use Uneak\FlatSkinBundle\Form\DataTransformer\ChoiceToTagTransformer;
	use Uneak\FlatSkinBundle\Form\DataTransformer\StringToChoiceArrayTransformer;
	use Uneak\FlatSkinBundle\Form\Transformer\DateTimeToPickerTransformer;
	use Uneak\FormsManagerBundle\Forms\AssetsComponentType;

	abstract class Select2Type extends AssetsComponentType {

		public function buildForm(FormBuilderInterface $builder, array $options) {


			$builder->addEventListener(FormEvents::PRE_BIND, function (FormEvent $event) use ($options) {

				if (!isset($options['options']['tags'])) {
					return;
				}

				$em = $options['em'];
				$class = $options['class'];
				$metaData = $em->getClassMetadata($class);
				$accessor = PropertyAccess::createPropertyAccessor();

				$property = $options['property'];
				$identifier = $metaData->getIdentifier()[0];

				$oData = $event->getData();
				$array = explode(",", $oData[0]);

				$rData = array();

				foreach ($array as $eTag) {
					$tag = $em->getRepository($class)->findOneBy(array($property => $eTag));
					if (!$tag) {
						$tag = $metaData->getReflectionClass()->newInstance();
						$accessor->setValue($tag, $property, $eTag);
						$em->persist($tag);
						$em->flush();
					}
					array_push($rData, $accessor->getValue($tag, $identifier));
				}

				$event->setData($rData);
			});
		}


		public function buildView(FormView $view, FormInterface $form, array $options) {

			$view->vars['options'] = $options['options'];
			if ($options['empty_value']) {
				$view->vars['options']['placeholder'] = $options['empty_value'];
				$view->vars['empty_value'] = "";
			}


			if (isset($view->vars['options']['tags'])) {

				$accessor = PropertyAccess::createPropertyAccessor();
				$property = $options['property'];
				$tags = $view->vars["data"];
				$rData = array();
				foreach ($tags as $tag) {
					array_push($rData, $accessor->getValue($tag, $property));
				}
				$view->vars["value"] = join(",", $rData);


				$view->vars['options']['tags'] = array();
				foreach ($view->vars['choices'] as $choice) {
					$view->vars['options']['tags'][] = $choice->label;
				}

				$view->vars['input'] = "hidden_widget";
			} else {
				$view->vars['input'] = "choice_widget";
			}

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





		public function buildAsset(AssetBuilder $builder, $parameters) {

			$builder
				->add("select2_js", new AssetExternalJs(), array(
					"src" => "/vendor/select2/select2.js"
				))
				->add("select2_css", new AssetExternalCss(), array(
					"href" => "/vendor/select2/select2.css"
				))
				->add("select2_bootstrap_css", new AssetExternalCss(), array(
					"href"         => "/vendor/select2-bootstrap-css/select2-bootstrap.css",
					"dependencies" => array("select2_css")
				))
				->add("script_select2", new AssetInternalJs(), array(
					"template"     => "UneakFlatSkinBundle:Form:select2/select2_script.html.twig",
					"parameters" => array('item' => $parameters)
				));

			if (isset($parameters->vars["options"]["language"])) {

				$builder->add("select2_language_js", new AssetExternalJs(), array(
					"src"          => "/vendor/select2/select2_locale_" . $parameters->vars["options"]["language"] . ".js",
					"dependencies" => array("select2_js"),
					"charset"      => "UTF-8"
				));

			}

		}


		public function getTheme() {
			return "UneakFlatSkinBundle:Form:select2/select2.html.twig";
		}

	}
