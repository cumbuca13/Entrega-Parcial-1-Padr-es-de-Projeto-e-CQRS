<?php

namespace App\Handlers;
use App\Queries\GetAtendimentosQuery;
use App\Models\Atendimento;

class GetAtendimentosHandler
{
public function handle(GetAtendimentosQuery $query)
{
$q = Atendimento::with(['paciente', 'dentista']);

if ($query->dentistaId) {
$q->where('dentista_id', $query->dentistaId);
}

return $q->get();
}
}