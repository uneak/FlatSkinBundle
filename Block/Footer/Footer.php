<?php

	namespace Uneak\FlatSkinBundle\Block\Footer;

	use Uneak\AdminBundle\Block\Block;

	class Footer extends Block {

		public function __construct() {
			$this->template = "UneakFlatSkinBundle:Block:Footer/block_footer.html.twig";
		}

	}
