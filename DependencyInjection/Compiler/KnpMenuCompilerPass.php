<?php

namespace Uneak\FlatSkinBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class KnpMenuCompilerPass implements CompilerPassInterface {

    public function process(ContainerBuilder $container) {

        $knp_menu_factory_definition = $container->getDefinition('knp_menu.factory');
        $knp_menu_factory_definition->setClass('Uneak\FlatSkinBundle\KnpMenu\MenuFactory');
    }

}
