<?php

namespace App\Contracts\Factories;

use App\Models\Atendimento;

/**
 * Interface do Factory responsável por criar instâncias de Atendimento.
 * As implementações (creators) deverão retornar um model Atendimento já
 * preenchido (mas não necessariamente salvo).
 */
interface AtendimentoFactoryInterface
{
    /**
     * Cria e retorna uma instância de Atendimento a partir dos dados fornecidos.
     *
     * @param array $data
     * @return Atendimento
     */
    public function make(array $data): Atendimento;
}