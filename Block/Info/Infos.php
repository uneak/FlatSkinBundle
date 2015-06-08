<?php

	namespace Uneak\FlatSkinBundle\Block\Info;

	use Uneak\AdminBundle\Block\BlockContainer;

	class Infos extends BlockContainer {

		protected $stripeRow = false;
		protected $columns = 2;

		public function __construct() {
			parent::__construct();
			$this->template = 'UneakFlatSkinBundle:Block:Info/block_infos.html.twig';
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
		public function isStripeRow() {
			return $this->stripeRow;
		}

		/**
		 * @param boolean $stripeRow
		 */
		public function setStripeRow($stripeRow) {
			$this->stripeRow = $stripeRow;
			return $this;
		}




	}
