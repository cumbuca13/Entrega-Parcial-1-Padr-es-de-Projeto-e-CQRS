<?php

namespace App\Factories;

use App\Models\Atendimento;
use App\Contracts\Factories\AtendimentoFactoryInterface;

abstract class AtendimentoCreator
{   
    /**
     * Método fábrica — deve ser implementado pelas subclasses.
     * Retorna uma factory concreta que implementa AtendimentoFactoryInterface.
     */
    abstract public function createFactory(): AtendimentoFactoryInterface;
}

