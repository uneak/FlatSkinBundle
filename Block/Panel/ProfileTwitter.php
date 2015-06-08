<?php

	namespace Uneak\FlatSkinBundle\Block\Panel;

	use Uneak\AdminBundle\Block\Block;

	class ProfileTwitter extends Block {

		protected $description;
		protected $color = "green";
		protected $photo;
		protected $link = "#";
		protected $infos;

		public function __construct() {
			parent::__construct();
			$this->template = 'UneakFlatSkinBundle:Block:Panel/panel_twitter.html.twig';

			$this->infos = array();
			$this->infos[0]["title"] = "Title";
			$this->infos[0]["value"] = "10";
			$this->infos[1]["title"] = "Title";
			$this->infos[1]["value"] = "20";
			$this->infos[2]["title"] = "Title";
			$this->infos[2]["value"] = "30";
		}

		public function getInfos() {
			return $this->infos;
		}

		public function getInfo($col) {
			return $this->infos[$col];
		}

		public function setInfoTitle($col, $title) {
			$this->infos[$col]["title"] = $title;
			return $this;
		}
		public function setInfoValue($col, $value) {
			$this->infos[$col]["value"] = $value;
			return $this;
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

	}
