<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	class SparklineBullet extends Sparkline {

		public function __construct($values = array()) {
			parent::__construct($values);

			$this->metas->_merge(array(
				"type"             => 'bullet',
				"targetColor"      => null,
				"targetWidth"      => null,
				"performanceColor" => null,
				"rangeColors"      => null,
			));

		}


	}
