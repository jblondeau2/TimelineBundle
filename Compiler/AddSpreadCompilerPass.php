<?php

namespace Highco\TimelineBundle\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

/**
 * AddSpreadCompilerPass
 *
 * @uses CompilerPassInterface
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class AddSpreadCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container)
    {
        foreach ($container->findTaggedServiceIds('highco.timeline.spread') as $id => $tags) {
            $container->getDefinition('highco.timeline.spread.manager')->addMethodCall('add', array($container->getDefinition($id)));
        }
    }
}
