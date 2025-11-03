<?php
namespace App\Strategies;

interface SchedulingStrategyInterface
{
/**
* Verifica se o atendimento pode ser agendado.
* Retorna true se permitido, false caso contrário.
* Pode lançar exceções customizadas se preferir.
*/
public function canSchedule(array $data): bool;
}