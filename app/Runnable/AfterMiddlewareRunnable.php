<?php

namespace App\Runnable;

use MJ\Lib\Router\Route;
use Symfony\Component\HttpFoundation\Request;

class AfterMiddlewareRunnable
{
    public static function run(Request $request, Route $routeInstance): Route
    {
        if($beforeMiddleware = $routeInstance->getBeforeMiddleware()) {
            $beforeMiddleware = new $beforeMiddleware();
            $routeInstance = $beforeMiddleware($request, $routeInstance);
        }
        return $routeInstance;
    }
}