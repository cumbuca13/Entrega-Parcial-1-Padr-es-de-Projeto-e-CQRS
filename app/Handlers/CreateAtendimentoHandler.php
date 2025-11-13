<?php

namespace App\Handlers;

use App\Commands\CreateAtendimentoCommand;
use App\Contracts\Factories\AtendimentoFactoryInterface;
use App\Contracts\Strategies\SchedulingStrategyInterface;
use App\Factories\AtendimentoOnlineCreator;
use App\Factories\AtendimentoPresencialCreator;
use App\Context\SchedulingContext;
use Illuminate\Contracts\Events\Dispatcher;
use InvalidArgumentException;
use DomainException;

class CreateAtendimentoHandler
{
    private SchedulingStrategyInterface $strategy;
    private Dispatcher $events;

    public function __construct(SchedulingStrategyInterface $strategy, Dispatcher $events)
    {
        $this->strategy = $strategy;
        $this->events = $events;
    }

    public function handle(CreateAtendimentoCommand $command)
    {
        $data = $command->data;

        // --- Validação simples ---
        if (empty($data['paciente_id']) || empty($data['dentista_id']) || empty($data['data'])) {
            throw new InvalidArgumentException('Dados insuficientes para criar atendimento.');
        }

        // --- Contexto do Strategy ---
        $context = new SchedulingContext($this->strategy);
        if (!$context->canSchedule($data)) {
            throw new DomainException('Conflito de horário para o dentista.');
        }

        // --- Factory Method (padrão Gamma) ---
        if (!empty($data['online']) && $data['online'] === true) {
            $creator = new AtendimentoOnlineCreator();
        } else {
            $creator = new AtendimentoPresencialCreator();
        }

        $factory = $creator->createFactory();
        $atendimento = $factory->make($data);

        $atendimento->save();

        // --- Dispara evento (caso queira seguir CQRS/Event Sourcing) ---
        $this->events->dispatch('atendimento.criado', [$atendimento]);

        return $atendimento;
    }
}
