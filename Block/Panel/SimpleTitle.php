<?php

	namespace Uneak\FlatSkinBundle\Block\Panel;

	use Uneak\AdminBundle\Block\BlockContainer;

	class SimpleTitle extends BlockContainer {

		public function __construct() {
			parent::__construct();
			$this->template = 'UneakFlatSkinBundle:Block:Panel/panel_simple_title.html.twig';
		}

	}
