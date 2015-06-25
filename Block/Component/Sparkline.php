<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	use Uneak\BlocksManagerBundle\Blocks\Component;
	use Uneak\AssetsManagerBundle\Assets\AssetExternalJs;
	use Uneak\AssetsManagerBundle\Assets\AssetInternalJs;

	class Sparkline extends Component {

		protected $values;

		public function __construct($values = array()) {
			parent::__construct();
			$this->values = $values;

			$this->metas->_init(array(
				"type"               => 'line',
				"width"              => null,
				"height"             => null,
				"lineColor"          => null,
				"fillColor"          => null,
				"chartRangeMin"      => null,
				"chartRangeMax"      => null,
				"composite"          => null,
				"enableTagOptions"   => null,
				"tagOptionPrefix"    => null,
				"tagValuesAttribute" => null,
				"disableHiddenCheck" => null,
			));

			$this->template = 'UneakFlatSkinBundle:Block:Component/component_sparkline.html.twig';



		}

		public function _registerAssets() {
			$script = array();
			$script["sparkline_js"] = new AssetExternalJs("/bundles/uneakflatskin/js/jquery.sparkline.js");

			$script_ = "$(function() { $('#{{ item.uniqid }}').sparkline({{ item.values | json_encode() }}, {{ item.jsArray | raw }}); });";
			$script["script_sparkline"] = new AssetInternalJs($script_, null, array('item' => $this));
			return $script;
		}

		public function getValues() {
			return $this->values;
		}

		public function addValue($value) {
			array_push($this->values, $value);
			return $this;
		}


		public function setValues($values) {
			$this->values = $values;
			return $this;
		}


	}
