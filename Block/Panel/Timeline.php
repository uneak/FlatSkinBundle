<?php

	namespace Uneak\FlatSkinBundle\Block\Panel;

	use Uneak\BlocksManagerBundle\Blocks\Block;

	class Timeline extends Block {

		protected $description;

		public function __construct() {
			parent::__construct();
			$this->template = 'UneakFlatSkinBundle:Block:Panel/panel_timeline.html.twig';
		}

		/**
		 * @return mixed
		 */
		public function getDescription() {
			return $this->description;
		}

		/**
		 * @param mixed $description
		 */
		public function setDescription($description) {
			$this->description = $description;

			return $this;
		}

	}
