<?php

	namespace Uneak\FlatSkinBundle\Block\Panel;

	use Uneak\AdminBundle\Block\BlockContainer;

	class Wrapper extends BlockContainer {

		protected $collapsable = false;
		protected $columns = 2;
		protected $styles = "";

		public function __construct() {
			parent::__construct();
			$this->template = 'UneakFlatSkinBundle:Block:Panel/panel_wrapper.html.twig';
		}

		public function getStyles() {
			return $this->styles;
		}

		public function setStyles($styles) {
			$this->styles = $styles;
			return $this;
		}

		/**
		 * @return int
		 */
		public function getColumns() {
			return $this->columns;
		}

		/**
		 * @param int $column
		 */
		public function setColumns($columns) {
			$this->columns = $columns;
			return $this;
		}



		/**
		 * @return boolean
		 */
		public function isCollapsable() {
			return $this->collapsable;
		}

		/**
		 * @param boolean $collapsable
		 */
		public function setCollapsable($collapsable) {
			$this->collapsable = $collapsable;

			return $this;
		}

	}
