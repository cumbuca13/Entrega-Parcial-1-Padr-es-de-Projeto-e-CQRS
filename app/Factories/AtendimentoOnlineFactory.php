<?php

namespace App\Factories;

use App\Contracts\Factories\AtendimentoFactoryInterface;
use App\Models\Atendimento;

class AtendimentoOnlineFactory implements AtendimentoFactoryInterface
{
    public function make(array $data): Atendimento
    {
        $atendimento = new Atendimento();
        $atendimento->tipo = 'online';
        $atendimento->fill($data);
        return $atendimento;
    }
}