<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	use Uneak\BlocksManagerBundle\Blocks\Component;
	use Uneak\AssetsManagerBundle\Assets\AssetExternalCss;
	use Uneak\AssetsManagerBundle\Assets\AssetExternalJs;
	use Uneak\AssetsManagerBundle\Assets\AssetInternalJs;

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

		public function _registerAssets(array &$assets, $parameters = null) {

            $assets["easy_pie_chart_js"] = new AssetExternalJs(array(
                "src" => "/bundles/uneakflatskin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"
            ));
            $assets["easy_pie_chart_css"] = new AssetExternalCss(array(
                "href" => "/bundles/uneakflatskin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css",
                "media" => "screen"
            ));

            $assets["script_easy_pie_chart"] = new AssetInternalJs(array(
                "content" => "$(function() { $('#{{ item.uniqid }}').easyPieChart({{ item.jsArray | raw }}); });",
                "parameters" => array('item' => $parameters)
            ));

		}

		public function getPercent() {
			return $this->percent;
		}

		public function setPercent($percent) {
			$this->percent = $percent;
			return $this;
		}



	}
