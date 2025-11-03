<?php

namespace App\Services;
use App\Models\Atendimento;

class AtendimentoFactory
{
public static function make(array $data): Atendimento
{
$atendimento = new Atendimento();
$atendimento->paciente_id = $data['paciente_id'];
$atendimento->dentista_id = $data['dentista_id'];
$atendimento->data = $data['data'];
$atendimento->descricao = $data['descricao'] ?? null;
$atendimento->status = $data['status'] ?? 'Agendado';


if (!empty($data['online'])) {
$atendimento->tipo = 'online';
} else {
$atendimento->tipo = 'presencial';
}

return $atendimento;
}
}