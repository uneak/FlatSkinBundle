<?php

	namespace Uneak\FlatSkinBundle\Block\DataTable;

	use Uneak\AdminBundle\Assets\ScriptFileTemplateJs;
	use Uneak\AdminBundle\Assets\ScriptJs;
	use Uneak\AdminBundle\Block\Block;
	use Uneak\AdminBundle\Block\ScriptFileJs;


	class DataTableFilters extends Block {

		protected $dataTable;
		protected $scriptTemplate;

		public function __construct($dataTable) {
			parent::__construct();
			$this->setDataTable($dataTable);
			$this->template = "UneakFlatSkinBundle:Block:DataTable/block_filters.html.twig";
			$this->scriptTemplate = "UneakFlatSkinBundle:Block:DataTable/script_block_filters.html.twig";
		}

		public function _registerScript() {
			$script = array();
			$script["script_datatable_filter"] = new ScriptFileTemplateJs($this->scriptTemplate, array("script_datatable"), array('item' => $this));
			return $script;
		}

		public function getScriptTemplate() {
			return $this->scriptTemplate;
		}

		public function setScriptTemplate($template) {
			$this->scriptTemplate = $template;
			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getDataTable() {
			return $this->dataTable;
		}

		/**
		 * @param mixed $dataTable
		 */
		public function setDataTable($dataTable) {
			$this->dataTable = $dataTable;
			return $this;
		}



	}
