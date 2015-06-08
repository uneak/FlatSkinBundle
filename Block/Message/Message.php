<?php

	namespace Uneak\FlatSkinBundle\Block\Message;

	use Uneak\AdminBundle\Block\Block;

	class Message extends Block {

		protected $time;
		protected $subTitle;
		protected $photo;
		protected $badge;

		public function __construct() {
			parent::__construct();
			$this->template = 'UneakFlatSkinBundle:Block:Message/block_message.html.twig';
		}

		public function getPhoto() {
			return $this->photo;
		}

		public function setPhoto($photo) {
			$this->photo = $photo;
			return $this;
		}

		public function getTime() {
			return $this->time;
		}

		public function setTime($time) {
			$this->time = $time;
			return $this;
		}

		public function getSubTitle() {
			return $this->subTitle;
		}

		public function setSubTitle($subTitle) {
			$this->subTitle = $subTitle;
			return $this;
		}

		public function getBadge() {
			return $this->badge;
		}

		public function setBadge($badge) {
			$this->badge = $badge;
			return $this;
		}

	}
