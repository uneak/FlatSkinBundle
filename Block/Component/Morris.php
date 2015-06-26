<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	use Uneak\BlocksManagerBundle\Blocks\Component;
	use Uneak\AssetsManagerBundle\Assets\Css\AssetExternalCss;
	use Uneak\AssetsManagerBundle\Assets\Js\AssetExternalJs;

	class Morris extends Component {


		public function __construct() {
			parent::__construct();

			$this->metas->_init(array(
				"element" => $this->uniqid,
				"data"    => array(),
				"resize"  => null,
			));


			$this->template = 'UneakFlatSkinBundle:Block:Component/component_morris.html.twig';

		}

		public function buildAsset(AssetBuilder $builder, $parameters) {

			$builder
				->add("morris_js", new AssetExternalJs(), array(
					"src" => "/bundles/uneakflatskin/assets/morris.js-0.4.3/morris.min.js"
				))
				->add("raphael_js", new AssetExternalJs(), array(
					"src" => "/bundles/uneakflatskin/assets/morris.js-0.4.3/raphael-min.js",
					"dependencies" => array("morris_js")
				))
				->add("", new AssetExternalCss(), array(
					"href" => "/bundles/uneakflatskin/assets/morris.js-0.4.3/morris.css"
				));

		}


	}
