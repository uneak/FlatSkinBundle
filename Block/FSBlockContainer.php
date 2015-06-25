<?php

	namespace Uneak\FlatSkinBundle\Block;

	use Uneak\BlocksManagerBundle\Blocks\Block;

	class FSBlockContainer extends Block {

		public function __construct() {
			parent::__construct();
			$this->template = "UneakFlatSkinBundle:Block:blocks.html.twig";
		}

	}
