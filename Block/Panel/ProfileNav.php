<?php

	namespace Uneak\FlatSkinBundle\Block\Panel;

	use Knp\Menu\FactoryInterface;
	use Uneak\BlocksManagerBundle\Blocks\Block;

	class ProfileNav extends Block {

		protected $description;
		protected $color = "green";
		protected $photo;
		protected $headerAlign = "horizontal";
		protected $menu;
		protected $link = "#";
		protected $cover;

		public function __construct() {
			parent::__construct();
			$this->template = 'UneakFlatSkinBundle:Block:Panel/panel_profile_nav.html.twig';
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

		/**
		 * @return mixed
		 */
		public function getPhoto() {
			return $this->photo;
		}

		/**
		 * @param mixed $photo
		 */
		public function setPhoto($photo) {
			$this->photo = $photo;
			return $this;
		}

		/**
		 * @return string
		 */
		public function getHeaderAlign() {
			return $this->headerAlign;
		}

		/**
		 * @param string $headerAlign
		 */
		public function setHeaderAlign($headerAlign) {
			$this->headerAlign = $headerAlign;
			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getCover() {
			return $this->cover;
		}

		/**
		 * @param mixed $cover
		 */
		public function setCover($cover) {
			$this->cover = $cover;

			return $this;
		}

	}
