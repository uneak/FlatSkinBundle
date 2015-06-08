<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	class SparklineLine extends Sparkline {

		public function __construct($values = array()) {
			parent::__construct($values);

			$this->metas->_merge(array(
				"type"                  => 'line',
				"defaultPixelsPerValue" => null,
				"spotColor"             => null,
				"minSpotColor"          => null,
				"maxSpotColor"          => null,
				"spotRadius"            => null,
				"valueSpots"            => null,
				"highlightSpotColor"    => null,
				"highlightLineColor"    => null,
				"lineWidth"             => null,
				"normalRangeMin"        => null,
				"normalRangeMax"        => null,
				"drawNormalOnTop"       => null,
				"xvalues"               => null,
				"chartRangeClip"        => null,
				"chartRangeMinX"        => null,
				"chartRangeMaxX"        => null,
			));

		}


	}
