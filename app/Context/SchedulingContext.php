<?php

namespace App\Context;

use App\Contracts\Strategies\SchedulingStrategyInterface;

class SchedulingContext
{
    private SchedulingStrategyInterface $strategy;

    public function __construct(SchedulingStrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function setStrategy(SchedulingStrategyInterface $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function canSchedule(array $data): bool
    {
        return $this->strategy->canSchedule($data);
    }
}