<?php

	namespace Uneak\FlatSkinBundle\Block\Menu;

	use Knp\Menu\FactoryInterface;
	use Knp\Menu\ItemInterface;
	use Uneak\AdminBundle\Block\Block;

	class Menu extends Block {

		protected $root;

		public function __construct() {
			parent::__construct();
			$this->template = "UneakFlatSkinBundle:Block:Menu/block_menu.html.twig";
		}

		public function getRoot() {
			return $this->root;
		}

		public function setRoot(ItemInterface $root) {
			$this->root = $root;
			return $this;
		}

	}
