<?php

use App\App;
use App\Interpreter\EndpointInterpreter;
use App\Runnable\BeforeMiddlewareRunnable;
use App\Runnable\DependencyInjectionRunnable;
use App\Runnable\InputDtoRunnable;
use App\Startable\StartableRouter;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/App.php';

App::instance()->configureRunnables(
    [
        BeforeMiddlewareRunnable::class,
        DependencyInjectionRunnable::class,
        InputDtoRunnable::class
    ]
);
App::instance()->setInterpreter(EndpointInterpreter::class);
App::instance()->start(StartableRouter::class);