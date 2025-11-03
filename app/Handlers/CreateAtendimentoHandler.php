<?php

namespace App\Handlers;
use App\Commands\CreateAtendimentoCommand;
use App\Services\AtendimentoFactory;
use App\Strategies\SchedulingStrategyInterface;
use Illuminate\Contracts\Events\Dispatcher;

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

// validação simples (poderia usar FormRequests antes de criar o comando)
if (empty($data['paciente_id']) || empty($data['dentista_id']) || empty($data['data'])) {
throw new \InvalidArgumentException('Dados insuficientes para criar atendimento.');
}

// usa Strategy para decidir se pode agendar
if (!$this->strategy->canSchedule($data)) {
throw new \DomainException('Conflito de horário para o dentista.');
}

$atendimento = AtendimentoFactory::make($data);
$atendimento->save();

return $atendimento;
}
}