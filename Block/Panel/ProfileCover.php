<?php

	namespace Uneak\FlatSkinBundle\Block\Panel;

	use Uneak\AdminBundle\Block\BlockContainer;

	class ProfileCover extends BlockContainer {

		protected $description;
		protected $photo;
		protected $cover;

		public function __construct() {
			parent::__construct();
			$this->template = 'UneakFlatSkinBundle:Block:Panel/panel_profile_cover.html.twig';


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
