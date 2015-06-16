<?php

	namespace Uneak\FlatSkinBundle\Block\Panel;

	class PanelPeoples extends Wrapper {

		protected $stripeRow = false;

		public function __construct() {
			parent::__construct();
			$this->template = 'UneakFlatSkinBundle:Block:Panel/panel_peoples.html.twig';
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




		public function addPanel(PanelPeople $block) {
			$this->addBlock($block, null, 0, "panel_people");
			return $this;
		}

		public function getPanels() {
			return $this->getBlocks("panel_people");
		}

	}
