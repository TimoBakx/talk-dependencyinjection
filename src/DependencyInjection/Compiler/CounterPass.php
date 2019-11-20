<?php
declare(strict_types=1);

namespace App\DependencyInjection\Compiler;

use App\Counter\CounterFactoryManual;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Compiler\ServiceLocatorTagPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;
use Symfony\Component\DependencyInjection\Reference;

final class CounterPass implements CompilerPassInterface
{
    /**
     * @throws ServiceNotFoundException
     * @throws InvalidArgumentException
     */
    public function process(ContainerBuilder $container): void
    {
        $serviceIds = $container->findTaggedServiceIds('app.counter');

        $references = [];
        foreach ($serviceIds as $className => $tags) {
            $references[$className] = new Reference($className);
        }

        $container->findDefinition(CounterFactoryManual::class)->setArgument(
            0,
            ServiceLocatorTagPass::register($container, $references)
        );
    }
}
