<?php

	namespace Uneak\FlatSkinBundle\Block\Component;

	use Uneak\BlocksManagerBundle\Blocks\Component;
	use Uneak\AssetsManagerBundle\Assets\AssetExternalCss;
	use Uneak\AssetsManagerBundle\Assets\AssetExternalJs;
	use Uneak\AssetsManagerBundle\Assets\AssetInternalJs;

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

		public function _registerAssets(array &$assets, $parameters = null) {

            $assets["jquery_dataTables_js"] = new AssetExternalJs(array(
                "src" => "/bundles/uneakflatskin/assets/advanced-datatable/media/js/jquery.dataTables.js",
            ));
            $assets["dt_bootstrap_js"] = new AssetExternalJs(array(
                "src" => "/bundles/uneakflatskin/assets/data-tables/DT_bootstrap.js",
                "dependencies" => array("jquery_dataTables_js")
            ));
            $assets["dt_bootstrap_css"] = new AssetExternalCss(array(
                "href" => "/bundles/uneakflatskin/assets/data-tables/DT_bootstrap.css",
            ));
            $assets["demo_table_css"] = new AssetExternalCss(array(
                "href" => "/bundles/uneakflatskin/assets/advanced-datatable/media/css/demo_table.css",
                "dependencies" => array("dt_bootstrap_css")
            ));
            $assets["demo_page_css"] = new AssetExternalCss(array(
                "href" => "/bundles/uneakflatskin/assets/advanced-datatable/media/css/demo_page.css",
                "dependencies" => array("demo_table_css")
            ));

            $assets["script_datatable"] = new AssetInternalJs(array(
                "template" => $this->scriptTemplate,
                "parameters" => array('item' => $parameters)
            ));

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
