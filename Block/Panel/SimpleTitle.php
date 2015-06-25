<?php

	namespace Uneak\FlatSkinBundle\Block\Panel;

	use Uneak\BlocksManagerBundle\Blocks\Block;

	class SimpleTitle extends Block {

		public function __construct() {
			parent::__construct();
			$this->template = 'UneakFlatSkinBundle:Block:Panel/panel_simple_title.html.twig';
		}

	}
