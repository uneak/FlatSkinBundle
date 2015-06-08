<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	class MorrisLineLine {

		protected $id;
		protected $label;
		protected $color;

		public function __construct($id, $label, $color) {
			$this->id = $id;
			$this->label = $label;
			$this->color = $color;
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
		public function getLabel() {
			return $this->label;
		}

		/**
		 * @param mixed $label
		 */
		public function setLabel($label) {
			$this->label = $label;
			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getId() {
			return $this->id;
		}




	}
