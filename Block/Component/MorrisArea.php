<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	use Uneak\AssetsManagerBundle\Assets\AssetBuilder;
	use Uneak\AssetsManagerBundle\Assets\Js\AssetInternalJs;

	class MorrisArea extends MorrisLine {

		public function __construct() {
			parent::__construct();
			$this->metas->_merge(array(
				"behaveLikeLine"   => null,
			));

		}

		public function buildAsset(AssetBuilder $builder, $parameters) {

			$builder
				->add("script_morris_area", new AssetInternalJs(), array(
					"content"   => "$(function() { Morris.Area({{ item.jsArray | raw }}); });",
					"parameters" => array('item' => $parameters)
				));
		}


	}
