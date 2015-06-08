<?php

	namespace Uneak\FlatSkinBundle\Block\Notification;

	use Uneak\AdminBundle\Block\Block;

	class Notification extends Block {

		protected $time;
		protected $context;
		protected $icon;

		public function __construct() {
			$this->template = 'UneakFlatSkinBundle:Block:Notification/block_notification.html.twig';
		}

		public function getContext() {
			return $this->context;
		}
		public function setContext($context) {
			$this->context = $context;
			return $this;
		}

		public function getIcon() {
			return $this->icon;
		}

		public function setIcon($icon) {
			$this->icon = $icon;
			return $this;
		}

		public function getTime() {
			return $this->time;
		}

		public function setTime($time) {
			$this->time = $time;
			return $this;
		}

	}
