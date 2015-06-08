<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	class SparklineDiscrete extends Sparkline {

		public function __construct($values = array()) {
			parent::__construct($values);

			$this->metas->_merge(array(
				"type"           => 'discrete',
				"lineHeight"     => null,
				"thresholdValue" => null,
				"thresholdColor" => null,
			));

		}


	}
