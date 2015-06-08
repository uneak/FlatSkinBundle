<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	use Uneak\AdminBundle\Assets\ScriptJs;
	use Uneak\AdminBundle\Block\Component;
	use Uneak\AdminBundle\Assets\ExternalCss;
	use Uneak\AdminBundle\Assets\ExternalJs;
	use Uneak\AdminBundle\Assets\ScriptFileTemplateJs;

	class EasyPieChart extends Component {

		protected $percent;

		public function __construct($percent = 0, $title = "") {
			parent::__construct();
			$this->percent = $percent;
			$this->title = $title;
			$this->metas->_init(array(
				"barColor"   => '#ef1e25',
				"trackColor" => '#f2f2f2',
				"scaleColor" => '#dfe0e0',
				"lineCap"    => 'round',
				"lineWidth"  => 3,
				"size"       => 110,
				"animate"    => false,
				"onStart"    => null,
				"onStop"     => null,
				"onStep"     => null,
			));

			$this->template = 'UneakFlatSkinBundle:Block:Component/component_easy_pie_chart.html.twig';

		}

		public function _registerExternalFile() {
			$script = array();
			$script["easy_pie_chart_js"] = new ExternalJs("/bundles/uneakflatskin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js");
			$script["easy_pie_chart_css"] = new ExternalCss("/bundles/uneakflatskin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css", null, "screen", "stylesheet");
			return $script;
		}

		public function _registerScript() {
			$script = array();
			$script_ = "$(function() { $('#{{ item.uniqid }}').easyPieChart({{ item.jsArray | raw }}); });";
			$script["script_easy_pie_chart"] = new ScriptJs($script_, null, array('item' => $this));
			return $script;
		}

		public function getPercent() {
			return $this->percent;
		}

		public function setPercent($percent) {
			$this->percent = $percent;
			return $this;
		}



	}
