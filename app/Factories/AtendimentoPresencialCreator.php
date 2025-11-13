<?php

namespace App\Factories;

use App\Contracts\Factories\AtendimentoFactoryInterface;

class AtendimentoPresencialCreator extends AtendimentoCreator
{
    public function createFactory(): AtendimentoFactoryInterface
    {
        return new AtendimentoPresencialFactory();
    }
}
