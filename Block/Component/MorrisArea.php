<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	use Uneak\AdminBundle\Assets\ScriptFileTemplateJs;
	use Uneak\AdminBundle\Assets\ScriptJs;

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
			$script["script_morris_area"] = new ScriptJs($script_, null, array('item' => $this));
			return $script;
		}

	}
