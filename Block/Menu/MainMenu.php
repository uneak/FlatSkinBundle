<?php

	namespace Uneak\FlatSkinBundle\Block\Menu;

	use Knp\Menu\FactoryInterface;
	use Uneak\BlocksManagerBundle\Blocks\Block;

	class MainMenu extends Menu {

		public function __construct() {
			parent::__construct();
			$this->setMeta('style', 'flat-menu');
			$this->template = "UneakFlatSkinBundle:Block:Menu/block_menu.html.twig";
		}

		public function preRender() {
			parent::preRender();
			$this->root->setChildrenAttribute('class', 'sidebar-menu');
			$this->root->setChildrenAttribute('id', 'nav-accordion');
		}


	}
