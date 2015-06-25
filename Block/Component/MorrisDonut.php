<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	use Uneak\AssetsManagerBundle\Assets\AssetInternalJs;

	class MorrisDonut extends Morris {

		protected $data = array();
		protected $formatter = null;

		public function __construct() {
			parent::__construct();
			$this->formatter = 'function (y) { return y + "%" }';

		}

		public function _registerScript() {
			$script = array();
			$script_ = "$(function() { Morris.Donut({{ item.jsArray | raw }}); });";
			$script["script_morris_donut"] = new AssetInternalJs($script_, null, array('item' => $this));
			return $script;
		}


		public function addData($label, $value, $color) {
			$this->data[$label] = array('value' => $value, 'color' => $color);
			return $this;
		}

		public function removeData($label) {
			unset($this->data[$label]);
			return $this;
		}

		public function getData($label) {
			return $this->data[$label];
		}

		public function getFormatter() {
			return $this->formatter;
		}

		public function setFormatter($formatter) {
			$this->formatter = $formatter;
			return $this;
		}


		public function getJsArray($array = null) {
			$array = array_merge($this->getMetas()->_getArray(), array(
				'data' => array(),
				'colors' => array(),
				'formatter' => '##'.$this->getFormatter().'##',
			));

			foreach ($this->data as $key => $value) {
				$array['data'][] = array('label' => $key, 'value' => $value['value']);
				$array['colors'][] = $value['color'];
			}

			return $this->_jsJson($array);
		}

	}
