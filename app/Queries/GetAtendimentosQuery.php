<?php

namespace App\Queries;

class GetAtendimentosQuery
{
public ?int $dentistaId;

public function __construct(?int $dentistaId = null)
{
$this->dentistaId = $dentistaId;
}
}