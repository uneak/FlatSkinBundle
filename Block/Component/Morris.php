<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	use Uneak\BlocksManagerBundle\Blocks\Component;
	use Uneak\AssetsManagerBundle\Assets\AssetExternalCss;
	use Uneak\AssetsManagerBundle\Assets\AssetExternalJs;

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

		public function _registerAssets() {
			$script = array();
			$script["morris_js"] = new AssetExternalJs("/bundles/uneakflatskin/assets/morris.js-0.4.3/morris.min.js");
			$script["raphael_js"] = new AssetExternalJs("/bundles/uneakflatskin/assets/morris.js-0.4.3/raphael-min.js", array("morris_js"));
			$script[] = new AssetExternalCss("/bundles/uneakflatskin/assets/morris.js-0.4.3/morris.css", null, "", "stylesheet");
			return $script;
		}

	}
