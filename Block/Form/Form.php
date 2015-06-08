<?php

	namespace Uneak\FlatSkinBundle\Block\Form;

	use Uneak\AdminBundle\Block\Block;


	class Form extends Block {

		protected $form;

		public function __construct($form) {
			parent::__construct();
			$this->setForm($form);
			$this->template = "UneakFlatSkinBundle:Block:Form/block_form.html.twig";
		}

		/**
		 * @return mixed
		 */
		public function getForm() {
			return $this->form;
		}

		/**
		 * @param mixed $form
		 */
		public function setForm($form) {
			$this->form = $form;
			return $this;
		}


	}
