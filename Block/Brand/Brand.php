<?php

	namespace Uneak\FlatSkinBundle\Block\Brand;

	use Uneak\AdminBundle\Block\Block;

	class Brand extends Block {

		protected $subTitle;
		protected $link;

		public function __construct() {
			$this->template = "UneakFlatSkinBundle:Block:Brand/block_brand.html.twig";
		}

		/**
		 * @return mixed
		 */
		public function getLink() {
			return $this->link;
		}

		/**
		 * @param mixed $link
		 */
		public function setLink($link) {
			$this->link = $link;
			return $this;
		}


		/**
		 * @return mixed
		 */
		public function getSubTitle() {
			return $this->subTitle;
		}

		/**
		 * @param mixed $subTitle
		 */
		public function setSubTitle($subTitle) {
			$this->subTitle = $subTitle;
			return $this;
		}



	}
