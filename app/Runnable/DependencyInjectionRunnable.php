<?php

namespace App\Runnable;

use MJ\Lib\DI\Container;
use MJ\Lib\Router\Route;
use Symfony\Component\HttpFoundation\Request;

class DependencyInjectionRunnable
{
    public static function run(Request $request, Route $routeInstance): Route
    {
        require_once __DIR__ . '/../../configurable/dependencyInjection.php';
        $diContainer = new Container();
        $routeInstance->setEndpointInstance(
            $diContainer->build($routeInstance->getTargetClassName())
        );
        return $routeInstance;
    }
}