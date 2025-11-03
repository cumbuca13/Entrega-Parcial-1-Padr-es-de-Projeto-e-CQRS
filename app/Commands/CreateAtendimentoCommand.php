<?php
namespace App\Commands;
class CreateAtendimentoCommand
{
public array $data;
public function __construct(array $data)
{
$this->data = $data;
}
}