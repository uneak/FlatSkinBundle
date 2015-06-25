<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	use Uneak\AssetsManagerBundle\Assets\AssetInternalJs;

	class MorrisLine extends Morris {

		protected $line = array();
		protected $period = array();

		public function __construct() {
			parent::__construct();
			$this->metas->_merge(array(
				"xkey"              => '#f2f2f2',
				"ykeys"             => '#dfe0e0',
				"labels"            => 'round',
				"lineColors"        => null,
				"lineWidth"         => null,
				"pointSize"         => null,
				"pointFillColors"   => null,
				"pointStrokeColors" => null,
				"ymax"              => null,
				"ymin"              => null,
				"smooth"            => null,
				"hideHover"         => null,
				"hoverCallback"     => null,
				"parseTime"         => null,
				"units"             => null,
				"postUnits"         => null,
				"preUnits"          => null,
				"dateFormat"        => null,
				"xLabels"           => null,
				"xLabelFormat"      => null,
				"xLabelAngle"       => null,
				"yLabelFormat"      => null,
				"goals"             => null,
				"goalStrokeWidth"   => null,
				"goalLineColors"    => null,
				"events"            => null,
				"eventStrokeWidth"  => null,
				"eventLineColors"   => null,
				"continuousLine"    => null,
				"axes"              => null,
				"grid"              => null,
				"gridTextColor"     => null,
				"gridTextSize"      => null,
				"gridTextFamily"    => null,
				"gridTextWeight"    => null,
				"fillOpacity"       => null,
				"resize"            => null,
			));



		}

		protected function _registerScript() {
			$script = array();
			$script_ = "$(function() { Morris.Line({{ item.jsArray | raw }}); });";
			$script["script_morris_line"] = new AssetInternalJs($script_, null, array('item' => $this));
			return $script;
		}

		public function addLine($id, $label, $color) {
			$this->line[$id] = new MorrisLineLine($id, $label, $color);
			return $this->line[$id];
		}

		public function getLine($id) {
			return $this->line[$id];
		}


		public function addPeriod($id, $label) {
			$this->period[$id] = new MorrisLinePeriod($label);
			return $this->period[$id];
		}

		public function getPeriod($id) {
			return $this->period[$id];
		}


		public function getJsArray($array = null) {
			$array = array_merge($this->getMetas()->_getArray(), array(
				'data' => array(),
				'xkey' => 'period',
				'ykeys' => array(),
				'labels' => array(),
				'lineColors' => array(),
			));

			foreach ($this->line as $line) {
				$array['ykeys'][] = $line->getId();
				$array['labels'][] = $line->getLabel();
				$array['lineColors'][] = $line->getColor();
			}

			foreach ($this->period as $period) {
				$dataRow = $period->getKeys();
				$dataRow['period'] = $period->getLabel();
				$array['data'][] = $dataRow;
			}

			return $this->_jsJson($array);
		}

	}
