<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	class SparklineTristate extends Sparkline {

		public function __construct($values = array()) {
			parent::__construct($values);

			$this->metas->_merge(array(
				"type"        => 'tristate',
				"posBarColor" => null,
				"negBarColor" => null,
				"negBarColor" => null,
				"barWidth"    => null,
				"barSpacing"  => null,
				"colorMap"    => null,
			));

		}


	}
