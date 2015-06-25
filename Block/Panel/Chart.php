<?php

	namespace Uneak\FlatSkinBundle\Block\Panel;

	use Uneak\BlocksManagerBundle\Blocks\Block;

	class Chart extends Block {

		protected $titleValue;
		protected $value;
		protected $description;
		protected $color = "green";

		public function __construct() {
			parent::__construct();
			$this->template = 'UneakFlatSkinBundle:Block:Panel/panel_chart.html.twig';
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
		public function getTitleValue() {
			return $this->titleValue;
		}

		/**
		 * @param mixed $titleValue
		 */
		public function setTitleValue($titleValue) {
			$this->titleValue = $titleValue;
			return $this;
		}

		/**
		 * @return string
		 */
		public function getColor() {
			return $this->color;
		}

		/**
		 * @param string $color
		 */
		public function setColor($color) {
			$this->color = $color;
			return $this;
		}


		public function getValue() {
			return $this->value;
		}

		public function setValue($value) {
			$this->value = $value;
			return $this;
		}

	}
