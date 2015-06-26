<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	use Uneak\AssetsManagerBundle\Assets\Js\AssetInternalJs;

	class MorrisArea extends MorrisLine {

		public function __construct() {
			parent::__construct();
			$this->metas->_merge(array(
				"behaveLikeLine"   => null,
			));

		}

		protected function _registerScript() {
			$script = array();
			$script_ = "$(function() { Morris.Area({{ item.jsArray | raw }}); });";
			$script["script_morris_area"] = new AssetInternalJs($script_, null, array('item' => $this));
			return $script;
		}

	}
