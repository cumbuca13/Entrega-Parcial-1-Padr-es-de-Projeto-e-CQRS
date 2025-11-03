<?php
namespace App\Strategies;

class SimpleSchedulingStrategy implements SchedulingStrategyInterface
{
public function canSchedule(array $data): bool
{
return true;
}
}