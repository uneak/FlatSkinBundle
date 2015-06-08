<?php

	namespace Uneak\FlatSkinBundle\Block\Info;

	use Uneak\AdminBundle\Block\Block;
	use Uneak\AdminBundle\Block\BlockInterface;

	class Info extends Block {

		protected $icon;
		protected $content;

		public function __construct($title = "", $content = null, $icon = null) {
			parent::__construct();
			$this->title = $title;
			$this->content = $content;
			$this->icon = $icon;

			$this->template = 'UneakFlatSkinBundle:Block:Info/block_info.html.twig';
		}

		public function getContent() {
			return $this->content;
		}

		public function setContent($content) {
			$this->content = $content;
			return $this;
		}

		public function getIcon() {
			return $this->icon;
		}

		public function setIcon($icon) {
			$this->icon = $icon;

			return $this;
		}

	}
