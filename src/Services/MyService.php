<?php
declare(strict_types=1);

namespace App\Services;

use Psr\Log\LoggerInterface;

final class MyService
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function doStuff()
    {
        $this->logger->info('Doing stuff');
    }
}
