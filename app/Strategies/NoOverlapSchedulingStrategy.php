<?php
namespace App\Strategies;
use App\Models\Atendimento;

class NoOverlapSchedulingStrategy implements SchedulingStrategyInterface
{
public function canSchedule(array $data): bool
{

$dentistaId = $data['dentista_id'];
$when = $data['data'];

$exists = Atendimento::where('dentista_id', $dentistaId)
->where('data', $when)
->exists();

return !$exists;
}
}