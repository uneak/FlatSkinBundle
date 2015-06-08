<?php

	namespace Uneak\FlatSkinBundle\Block\Panel;

	use Uneak\AdminBundle\Block\BlockContainer;

	class Follower extends BlockContainer {

		protected $color = "green";
		protected $photo;
		protected $col1 = array();
		protected $col2 = array();

		public function __construct() {
			parent::__construct();
			$this->template = 'UneakFlatSkinBundle:Block:Panel/panel_follower.html.twig';
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
		}

		/**
		 * @return mixed
		 */
		public function getCol1() {
			return $this->col1;
		}

		/**
		 * @param mixed $col1
		 */
		public function setCol1($title, $description) {
			$this->col1['title'] = $title;
			$this->col1['description'] = $description;
			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getCol2() {
			return $this->col2;
		}

		/**
		 * @param mixed $col2
		 */
		public function setCol2($title, $description) {
			$this->col2['title'] = $title;
			$this->col2['description'] = $description;
			return $this;
		}


	}
