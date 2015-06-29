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
	use Uneak\AssetsManagerBundle\Assets\AssetBuilder;
	use Uneak\AssetsManagerBundle\Assets\Js\AssetExternalJs;
	use Uneak\AssetsManagerBundle\Assets\Js\AssetInternalJs;
    use Uneak\FlatSkinBundle\Form\DataTransformer\IdToEntityTransformer;
    use Uneak\FlatSkinBundle\Form\DataTransformer\StringToJsonArrayTransformer;
	use Uneak\FlatSkinBundle\Form\Transformer\DateTimeToPickerTransformer;
	use Uneak\FormsManagerBundle\Forms\AssetsComponentType;

	class RouteType extends AssetsComponentType {


        protected $em;


        public function __construct($em) {
            $this->em = $em;
        }

		public function buildForm(FormBuilderInterface $builder, array $options) {

            $fields = $options['fields'];
            foreach ($fields as $key => $options) {
                $builder->add(
                    $builder->create($key, 'entity_select2',
                        array_merge($options, array(

                        ))
                    )->addModelTransformer(new IdToEntityTransformer($this->em, $options['class']))
                );

            }


//            $builder->addModelTransformer(new StringToJsonArrayTransformer());

		}


		public function buildView(FormView $view, FormInterface $form, array $options) {

			$view->vars['route'] = $options['route'];
			$view->vars['fields'] = $options['fields'];

		}


		public function setDefaultOptions(OptionsResolverInterface $resolver) {

			$resolver->setDefaults(array(
				'route' => array(),
				'fields' => array(),
				'compound' => true
			));

			$resolver->setDefined(
				array(
					'route',
					'fields',
				)
			);

		}





		public function buildAsset(AssetBuilder $builder, $parameters) {

            $builder

                ->add("script_route", new AssetInternalJs(), array(
                    "template" => "UneakFlatSkinBundle:Form:route/route_script.html.twig",
                    "parameters" => array('item' => $parameters)
                ));

		}

//		public function getTheme() {
//			return "UneakFlatSkinBundle:Form:route/route.html.twig";
//		}


		public function getName() {
			return 'route';
		}

	}
