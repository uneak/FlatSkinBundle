<?php


	namespace Uneak\FlatSkinBundle\KnpMenu;

	use Knp\Menu\FactoryInterface;
	use Knp\Menu\Factory\CoreExtension;
	use Knp\Menu\Factory\ExtensionInterface;
	use Uneak\FlatSkinBundle\KnpMenu\MenuIconExtension;
	use Uneak\FlatSkinBundle\KnpMenu\MenuItem;

	class MenuFactory implements FactoryInterface {
		/**
		 * @var array[]
		 */
		private $extensions = array();

		/**
		 * @var ExtensionInterface[]
		 */
		private $sorted;

		public function __construct() {
			$this->addExtension(new CoreExtension(), -10);
			$this->addExtension(new MenuIconExtension(), 0);
		}

		public function createItem($name, array $options = array()) {
			foreach ($this->getExtensions() as $extension) {
				$options = $extension->buildOptions($options);
			}

			$item = new MenuItem($name, $this);

			foreach ($this->getExtensions() as $extension) {
				$extension->buildItem($item, $options);
			}

			return $item;
		}

		/**
		 * Adds a factory extension
		 *
		 * @param ExtensionInterface $extension
		 * @param integer            $priority
		 */
		public function addExtension(ExtensionInterface $extension, $priority = 0) {
			$this->extensions[$priority][] = $extension;
			$this->sorted = null;
		}

		/**
		 * Sorts the internal list of extensions by priority.
		 *
		 * @return ExtensionInterface[]
		 */
		private function getExtensions() {
			if (null === $this->sorted) {
				krsort($this->extensions);
				$this->sorted = !empty($this->extensions) ? call_user_func_array('array_merge', $this->extensions) : array();
			}

			return $this->sorted;
		}
	}
