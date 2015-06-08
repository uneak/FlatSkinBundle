<?php

	namespace Uneak\FlatSkinBundle\Block\Panel;

	use Uneak\AdminBundle\Block\Block;

	class Counter extends Block {

		protected $count = "";
		protected $icon = "";
		protected $context = "terques";
		protected $color;

		public function __construct() {
			$this->template = 'UneakFlatSkinBundle:Block:Panel/panel_counter.html.twig';
		}

		public function getCount() {
			return $this->count;
		}

		public function setCount($count) {
			$this->count = $count;
			return $this;
		}

		public function getIcon() {
			return $this->icon;
		}

		public function setIcon($icon) {
			$this->icon = $icon;
			return $this;
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


	}
