<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	use Uneak\AssetsManagerBundle\Assets\AssetBuilder;
	use Uneak\AssetsManagerBundle\Assets\Js\AssetInternalJs;

	class MorrisBar extends MorrisLine {

		protected $line = array();
		protected $period = array();

		public function __construct() {
			parent::__construct();
			$this->metas->_merge(array(
				"xkey"              => '#f2f2f2',
				"ykeys"             => '#dfe0e0',
				"labels"            => 'round',
				"barColors"        => null,
				"hideHover"         => null,
				"hoverCallback"     => null,
				"axes"              => null,
				"grid"              => null,
				"gridTextColor"     => null,
				"gridTextSize"      => null,
				"gridTextFamily"    => null,
				"gridTextWeight"    => null,
				"resize"            => null,
			));



		}


		public function buildAsset(AssetBuilder $builder, $parameters) {

			$builder
				->add("script_morris_bar", new AssetInternalJs(), array(
					"content"   => "$(function() { Morris.Bar({{ item.jsArray | raw }}); });",
					"parameters" => array('item' => $parameters)
				));
		}



		public function getJsArray($array = null) {
			$array = array_merge($this->getMetas()->_getArray(), array(
				'data' => array(),
				'xkey' => 'period',
				'ykeys' => array(),
				'labels' => array(),
				'barColors' => array(),
			));

			foreach ($this->line as $line) {
				$array['ykeys'][] = $line->getId();
				$array['labels'][] = $line->getLabel();
				$array['barColors'][] = $line->getColor();
			}

			foreach ($this->period as $period) {
				$dataRow = $period->getKeys();
				$dataRow['period'] = $period->getLabel();
				$array['data'][] = $dataRow;
			}

			return $this->_jsJson($array);
		}

	}
