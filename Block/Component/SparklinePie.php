<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	class SparklinePie extends Sparkline {

		public function __construct($values = array()) {
			parent::__construct($values);

			$this->metas->_merge(array(
				"type"        => 'pie',
				"sliceColors" => null,
				"offset"      => null,
				"borderWidth" => null,
				"borderColor" => null,
			));

		}


	}
