<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	use Uneak\AdminBundle\Assets\ScriptJs;
	use Uneak\AdminBundle\Block\Component;
	use Uneak\AdminBundle\Assets\ExternalCss;
	use Uneak\AdminBundle\Assets\ExternalJs;
	use Uneak\AdminBundle\Assets\ScriptFileTemplateJs;

	class DataTable extends Component {

		protected $columns = array();
		protected $iDisplayLength = 10;
		protected $stateSave = false;
		protected $processing = true;
		protected $serverSide = true;
		protected $ajax;
		protected $scriptTemplate;

		public function __construct() {
			parent::__construct();
			$this->template = 'UneakFlatSkinBundle:Block:Component/component_datatable.html.twig';
			$this->scriptTemplate = "UneakFlatSkinBundle:Block:Component/script_datatable.html.twig";
		}

		public function _registerExternalFile() {
			$script = array();
			$script["jquery_dataTables_js"] = new ExternalJs("/bundles/uneakflatskin/assets/advanced-datatable/media/js/jquery.dataTables.js", null, "", "text/javascript", "script");
			$script["dt_bootstrap_js"] = new ExternalJs("/bundles/uneakflatskin/assets/data-tables/DT_bootstrap.js", array("jquery_dataTables_js"), "", "text/javascript", "script");

			$script["dt_bootstrap_css"] = new ExternalCss("/bundles/uneakflatskin/assets/data-tables/DT_bootstrap.css", null, "", "stylesheet");
			$script["demo_table_css"] = new ExternalCss("/bundles/uneakflatskin/assets/advanced-datatable/media/css/demo_table.css", array("dt_bootstrap_css"), "", "stylesheet");
			$script["demo_page_css"] = new ExternalCss("/bundles/uneakflatskin/assets/advanced-datatable/media/css/demo_page.css", array("demo_table_css"), "", "stylesheet");

			return $script;
		}

		public function _registerScript() {
			$script = array();
			$script["script_datatable"] = new ScriptFileTemplateJs($this->scriptTemplate, null, array('item' => $this));
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
		public function getAjax() {
			return $this->ajax;
		}

		/**
		 * @param mixed $ajax
		 */
		public function setAjax($ajax) {
			$this->ajax = $ajax;
			return $this;
		}

		/**
		 * @return int
		 */
		public function getIDisplayLength() {
			return $this->iDisplayLength;
		}

		/**
		 * @param int $iDisplayLength
		 */
		public function setIDisplayLength($iDisplayLength) {
			$this->iDisplayLength = $iDisplayLength;
			return $this;
		}

		/**
		 * @return boolean
		 */
		public function isProcessing() {
			return $this->processing;
		}

		/**
		 * @param boolean $processing
		 */
		public function setProcessing($processing) {
			$this->processing = $processing;
			return $this;
		}

		/**
		 * @return boolean
		 */
		public function isServerSide() {
			return $this->serverSide;
		}

		/**
		 * @param boolean $serverSide
		 */
		public function setServerSide($serverSide) {
			$this->serverSide = $serverSide;
			return $this;
		}

		/**
		 * @return boolean
		 */
		public function isStateSave() {
			return $this->stateSave;
		}

		/**
		 * @param boolean $stateSave
		 */
		public function setStateSave($stateSave) {
			$this->stateSave = $stateSave;
			return $this;
		}



		public function addColumn($column) {
			array_push($this->columns, $column);
			return $this;
		}

		public function removeColumn($column) {
			$key = array_search($column, $this->columns);
			if ($key !== false) {
				array_splice($this->columns, $key, 1);
			}
			return $this;
		}

		public function getColumns() {
			return $this->columns;
		}

		public function setColumns($columns) {
			$this->columns = $columns;
			return $this;
		}


	}
