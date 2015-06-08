<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	use Uneak\AdminBundle\Assets\ScriptJs;
	use Uneak\AdminBundle\Block\Block;
	use Uneak\AdminBundle\Block\Component;
	use Uneak\AdminBundle\Assets\ExternalJs;
	use Uneak\AdminBundle\Assets\ScriptFileTemplateJs;

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

		public function _registerExternalFile() {
			$script = array();
			$script["sparkline_js"] = new ExternalJs("/bundles/uneakflatskin/js/jquery.sparkline.js");
			return $script;
		}

		public function _registerScript() {
			$script = array();
			$script_ = "$(function() { $('#{{ item.uniqid }}').sparkline({{ item.values | json_encode() }}, {{ item.jsArray | raw }}); });";
			$script["script_sparkline"] = new ScriptJs($script_, null, array('item' => $this));
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
