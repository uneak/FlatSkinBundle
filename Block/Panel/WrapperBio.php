<?php

	namespace Uneak\FlatSkinBundle\Block\Panel;

	class WrapperBio extends Wrapper {

		protected $bio = "";
		protected $stripeRow = false;

		public function __construct() {
			parent::__construct();
			$this->template = 'UneakFlatSkinBundle:Block:Panel/panel_bio.html.twig';
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


		/**
		 * @return string
		 */
		public function getBio() {
			return $this->bio;
		}

		/**
		 * @param string $bio
		 */
		public function setBio($bio) {
			$this->bio = $bio;

			return $this;
		}


	}
