<?php

	namespace Uneak\FlatSkinBundle\Block\User;

	use Knp\Menu\FactoryInterface;
	use Uneak\BlocksManagerBundle\Blocks\Block;

	class User extends Block {

		protected $username;
		protected $photo;

		public function __construct() {
			parent::__construct();
			$this->template = "UneakFlatSkinBundle:Block:User/block_user.html.twig";
		}

		public function getUsername() {
			return $this->username;
		}

		public function setUsername($username) {
			$this->username = $username;
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
