<?php

	namespace Uneak\FlatSkinBundle\Block;

	use Uneak\AdminBundle\Block\BlockContainer;

	class FSBlockContainer extends BlockContainer {

		public function __construct() {
			parent::__construct();
			$this->template = "UneakFlatSkinBundle:Block:blocks.html.twig";
		}

	}
