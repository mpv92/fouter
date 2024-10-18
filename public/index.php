<?php

use App\App;
use App\Runnable\BeforeMiddlewareRunnable;
use App\Runnable\DependencyInjectionRunnable;
use App\Startable\StartableRouter;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/App.php';

App::instance()->configureRunnables(
    [
        BeforeMiddlewareRunnable::class,
        DependencyInjectionRunnable::class,
    ]
);
App::instance()->start(StartableRouter::class);