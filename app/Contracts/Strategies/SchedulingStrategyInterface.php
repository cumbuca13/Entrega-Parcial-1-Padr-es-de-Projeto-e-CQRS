<?php

namespace App\Contracts\Strategies;

/**
 * Interface para estratégias de agendamento.
 * Segue o padrão Strategy.
 */
interface SchedulingStrategyInterface
{
    /**
     * Verifica se é possível agendar o atendimento de acordo com a estratégia definida.
     *
     * @param array $data
     * @return bool
     */
    public function canSchedule(array $data): bool;
}
