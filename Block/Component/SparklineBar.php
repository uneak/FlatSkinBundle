<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	class SparklineBar extends Sparkline {

		public function __construct($values = array()) {
			parent::__construct($values);

			$this->metas->_merge(array(
				"type"            => 'bar',
				"barColor"        => null,
				"negBarColor"     => null,
				"zeroColor"       => null,
				"nullColor"       => null,
				"barWidth"        => null,
				"barSpacing"      => null,
				"zeroAxis"        => null,
				"colorMap"        => null,
				"stackedBarColor" => null,
			));

		}


	}
