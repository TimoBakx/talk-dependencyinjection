<?php
declare(strict_types=1);

namespace App\Counter;

use App\Entity\StatisticsType;
use Psr\Container\ContainerInterface;

final class CounterFactory
{
    /**
     * @var ContainerInterface<CounterInterface>
     */
    private $serviceLocator;

    public function __construct(ContainerInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    public function get(StatisticsType $type): CounterInterface
    {
        if ($this->serviceLocator->has($type->getCounterClass())) {
            return $this->serviceLocator->get($type->getCounterClass());
        }

        throw new \RuntimeException(sprintf('Counter %s not found', $type->getCounterClass()));
    }
}
