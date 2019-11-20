<?php
declare(strict_types=1);

namespace App\Entity;

final class StatisticsType
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $counterClass;

    public function __construct(string $code, string $counterClass)
    {
        $this->code = $code;
        $this->counterClass = $counterClass;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getCounterClass(): string
    {
        return $this->counterClass;
    }
}
