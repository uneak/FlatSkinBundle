<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	class SparklineBox extends Sparkline {

		public function __construct($values = array()) {
			parent::__construct($values);

			$this->metas->_merge(array(
				"type"             => 'box',
				"raw"              => null,
				"showOutliers"     => null,
				"outlierIQR"       => null,
				"boxLineColor"     => null,
				"boxFillColor"     => null,
				"whiskerColor"     => null,
				"outlierLineColor" => null,
				"outlierFillColor" => null,
				"spotRadius"       => null,
				"medianColor"      => null,
				"target"           => null,
				"targetColor"      => null,
				"minValue"         => null,
				"maxValue"         => null,
			));

		}


	}
