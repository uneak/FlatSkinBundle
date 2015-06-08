<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	class MorrisLinePeriod {

		protected $keys = array();
		protected $label;

		public function __construct($label) {
			$this->label = $label;
		}

		/**
		 * @return mixed
		 */
		public function getLabel() {
			return $this->label;
			return $this;
		}

		/**
		 * @param mixed $label
		 */
		public function setLabel($label) {
			$this->label = $label;
		}

		public function addKey($line, $value) {
			$this->keys[$line] = $value;
			return $this;
		}

		public function getKeys() {
			return $this->keys;
		}

	}
