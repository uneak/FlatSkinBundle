<?php

	namespace Uneak\FlatSkinBundle;

	use Symfony\Component\DependencyInjection\ContainerBuilder;
	use Symfony\Component\HttpKernel\Bundle\Bundle;
	use Uneak\FlatSkinBundle\DependencyInjection\Compiler\KnpMenuCompilerPass;

	class UneakFlatSkinBundle extends Bundle {

		public function build(ContainerBuilder $container) {
			parent::build($container);
			$container->addCompilerPass(new KnpMenuCompilerPass());
		}

	}
