<?php

	namespace Uneak\FlatSkinBundle\Block\Panel;

	use Uneak\BlocksManagerBundle\Blocks\Block;

	class TimelineItem extends Block {

		protected $description;
		protected $color;
		protected $context;
		protected $date;
		
		public function __construct() {
			parent::__construct();
			$this->template = 'UneakFlatSkinBundle:Block:Panel/panel_timeline_item.html.twig';
		}

		/**
		 * @return mixed
		 */
		public function getColor() {
			return $this->color;
		}

		/**
		 * @param mixed $color
		 */
		public function setColor($color) {
			$this->color = $color;
			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getContext() {
			return $this->context;
		}

		/**
		 * @param mixed $context
		 */
		public function setContext($context) {
			$this->context = $context;
			return $this;
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

		/**
		 * @return mixed
		 */
		public function getDate() {
			return $this->date;
		}

		/**
		 * @param mixed $date
		 */
		public function setDate($date) {
			$this->date = $date;
			return $this;
		}



	}
