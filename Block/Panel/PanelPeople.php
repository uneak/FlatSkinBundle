<?php

	namespace Uneak\FlatSkinBundle\Block\Panel;

	use Knp\Menu\FactoryInterface;
	use Uneak\AdminBundle\Block\BlockContainer;
	use Uneak\FlatSkinBundle\Block\Menu\Menu;

	class PanelPeople extends BlockContainer {

		protected $description;
		protected $photo;
		protected $link = "#";
		protected $subtitle = "";

		public function __construct() {
			parent::__construct();
			$this->template = 'UneakFlatSkinBundle:Block:Panel/panel_people.html.twig';
		}


		public function setMenu(Menu $menu) {
			$this->removeBlock("menu");
			$this->addBlock($menu, "menu", 0, "menu");
			return $this;
		}

		public function getMenu() {
			return $this->getBlock("menu", "menu");
		}


		/**
		 * @return string
		 */
		public function getSubtitle() {
			return $this->subtitle;
		}

		/**
		 * @param string $subtitle
		 */
		public function setSubtitle($subtitle) {
			$this->subtitle = $subtitle;
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
