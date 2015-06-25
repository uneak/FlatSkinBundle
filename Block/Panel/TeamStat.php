<?php

	namespace Uneak\FlatSkinBundle\Block\Panel;

	use Uneak\BlocksManagerBundle\Blocks\Block;

	class TeamStat extends Block {

		protected $subTitle;
		protected $description;
		protected $photo;
		protected $menu;

		public function __construct() {
			parent::__construct();
			$this->template = 'UneakFlatSkinBundle:Block:Panel/panel_team_stat.html.twig';


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



		public function getSubTitle() {
			return $this->subTitle;
		}

		public function setSubTitle($subTitle) {
			$this->subTitle = $subTitle;
			return $this;
		}


		public function getMenu() {
			return $this->menu;
		}

		public function setMenu($menu) {
			$this->menu = $menu;
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
