<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Strategies\SchedulingStrategyInterface;
use App\Strategies\NoOverlapSchedulingStrategy;

class PatternServiceProvider extends ServiceProvider
{
public function register()
{
$this->app->bind(SchedulingStrategyInterface::class, NoOverlapSchedulingStrategy::class);

$this->app->singleton(\App\Handlers\CreateAtendimentoHandler::class);
$this->app->singleton(\App\Handlers\GetAtendimentosHandler::class);
}

public function boot()
{
    
}
}