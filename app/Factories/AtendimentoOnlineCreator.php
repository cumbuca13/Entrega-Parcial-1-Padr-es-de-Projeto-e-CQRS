<?php

namespace App\Factories;

use App\Contracts\Factories\AtendimentoFactoryInterface;

class AtendimentoOnlineCreator extends AtendimentoCreator
{
    public function createFactory(): AtendimentoFactoryInterface
    {
        return new AtendimentoOnlineFactory();
    }
}
