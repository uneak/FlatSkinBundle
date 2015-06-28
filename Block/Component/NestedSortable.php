<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	use Uneak\AssetsManagerBundle\Assets\AssetBuilder;
	use Uneak\BlocksManagerBundle\Blocks\Component;
	use Uneak\AssetsManagerBundle\Assets\Css\AssetExternalCss;
	use Uneak\AssetsManagerBundle\Assets\Js\AssetExternalJs;
	use Uneak\AssetsManagerBundle\Assets\Js\AssetInternalJs;

	class NestedSortable extends Component {

		protected $scriptTemplate;
        protected $menu;

		public function __construct() {
			parent::__construct();
			$this->template = 'UneakFlatSkinBundle:Block:Component/component_nested_sortable.html.twig';
			$this->scriptTemplate = "UneakFlatSkinBundle:Block:Component/script_nested_sortable.html.twig";
		}

		public function buildAsset(AssetBuilder $builder, $parameters) {

			$builder
                ->add("jquery_ui_js", new AssetExternalJs(), array(
                    "src" => "/vendor/jquery-ui/jquery-ui.js",
                ))

				->add("jquery_sortable_js", new AssetExternalJs(), array(
					"src" => "/vendor/nestedSortable/jquery.mjs.nestedSortable.js",
                    "dependencies" => array("jquery_ui_js")
				))

                ->add("jquery_ui_css", new AssetExternalCss(), array(
                    "href" => "/vendor/jquery-ui/themes/smoothness/jquery-ui.css",
                ))

                ->add("nested_sortable_css", new AssetExternalCss(), array(
                    "href" => "/bundles/uneakflatskin/css/nested-sortable.css",
                ))

                ->add("script_jquery_sortable", new AssetInternalJs(), array(
					"template"   => $this->scriptTemplate,
					"parameters" => array('item' => $parameters)
				));

		}


		public function getScriptTemplate() {
			return $this->scriptTemplate;
		}

		public function setScriptTemplate($template) {
			$this->scriptTemplate = $template;
			return $this;
		}

        /**
         * @return mixed
         */
        public function getMenu()
        {
            return $this->menu;
        }

        /**
         * @param mixed $menu
         */
        public function setMenu($menu)
        {
            $this->menu = $menu;
            return $this;
        }




	}
