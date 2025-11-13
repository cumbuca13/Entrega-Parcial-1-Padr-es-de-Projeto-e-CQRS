<?php

namespace App\Factories;

use App\Contracts\Factories\AtendimentoFactoryInterface;
use App\Models\Atendimento;

class AtendimentoPresencialFactory implements AtendimentoFactoryInterface
{
    public function make(array $data): Atendimento
    {
        $atendimento = new Atendimento();
        $atendimento->tipo = 'presencial';
        $atendimento->fill($data);
        return $atendimento;
    }
}
