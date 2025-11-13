<?php
namespace App\Strategies;
use App\Contracts\Strategies\SchedulingStrategyInterface;

class SimpleSchedulingStrategy implements SchedulingStrategyInterface
{
public function canSchedule(array $data): bool
{
return true;
}
}