<?php

namespace App\Runnable;

use MJ\Lib\Router\Route;
use Symfony\Component\HttpFoundation\Request;

class BeforeMiddlewareRunnable
{
    public static function run(Request $request, Route $routeInstance): Route
    {
        if ($afterMiddleware = $routeInstance->getAfterMiddleware()) {
            $afterMiddleware = new $afterMiddleware();
            $afterMiddleware($request, $routeInstance);
        }
        return $routeInstance;
    }
}