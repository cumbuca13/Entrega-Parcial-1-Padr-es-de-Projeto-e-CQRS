<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Commands\CreateAtendimentoCommand;
use App\Handlers\CreateAtendimentoHandler;
use App\Queries\GetAtendimentosQuery;
use App\Handlers\GetAtendimentosHandler;

class AtendimentoController extends Controller
{
private CreateAtendimentoHandler $createHandler;
private GetAtendimentosHandler $getHandler;

public function __construct(CreateAtendimentoHandler $createHandler, GetAtendimentosHandler $getHandler)
{
$this->createHandler = $createHandler;
$this->getHandler = $getHandler;
}

public function index(Request $request)
{
$dentistaId = $request->query('dentista_id');
$query = new GetAtendimentosQuery($dentistaId);
$result = $this->getHandler->handle($query);

return response()->json($result);
}

public function store(Request $request)
{
$payload = $request->only(['paciente_id','dentista_id','data','descricao','online','status']);

$command = new CreateAtendimentoCommand($payload);
$atendimento = $this->createHandler->handle($command);

return response()->json($atendimento, 201);
}
}