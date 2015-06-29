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
	use Uneak\FlatSkinBundle\Form\DataTransformer\StringToJsonArrayTransformer;
	use Uneak\FlatSkinBundle\Form\Transformer\DateTimeToPickerTransformer;
	use Uneak\FormsManagerBundle\Forms\AssetsComponentType;

	class RoutesType extends AssetsComponentType {


        protected $routes;

        public function __construct($routes) {
            $this->routes = $routes;
        }

		public function buildForm(FormBuilderInterface $builder, array $options) {

            $routes = array();
            foreach ($this->routes as $key => $element) {
                $routes[$key] = $element['label'];
            }
            $routes['uri'] = "Lien externe";


            $builder->add('route', 'choice_select2', array(
                'label' => "Selectionnez le type de route",
                'choices'   => $routes,

                'options' => array(
                    'language' => 'fr',
                ),
                'multiple'  => false,

                'empty_value' => 'Sectionnez la route',
                'required' => false,
            ));


            foreach ($this->routes as $key => $element) {
                $builder->add($key, 'route', $element);
            }

            $builder->add('uri', 'url', array(
                'label' => "Url",
                'required' => false,
            ));

		}


		public function buildView(FormView $view, FormInterface $form, array $options) {

            $routes = array();
            foreach ($this->routes as $key => $element) {
                $routes[] = $key;
            }
            $routes[] = 'uri';


            $view->vars['routes'] = $routes;



		}


		public function setDefaultOptions(OptionsResolverInterface $resolver) {

			$resolver->setDefaults(array(
				'compound' => true
			));


		}





		public function buildAsset(AssetBuilder $builder, $parameters) {


//            ldd($parameters);

            $builder

                ->add("script_routes", new AssetInternalJs(), array(
                    "template" => "UneakFlatSkinBundle:Form:route/routes_script.html.twig",
                    "parameters" => array('item' => $parameters)
                ));

		}

//		public function getTheme() {
//			return "UneakFlatSkinBundle:Form:route/route.html.twig";
//		}


		public function getName() {
			return 'routes';
		}

	}
