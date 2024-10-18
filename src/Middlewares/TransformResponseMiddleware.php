<?php

namespace MJ\Middlewares;

use MJ\Lib\Http\Middleware;
use MJ\Lib\Router\Route;
use Symfony\Component\HttpFoundation\Request;

class TransformResponseMiddleware extends Middleware
{
    public function __invoke(Request $request, Route $route): ?Route
    {
        echo "ok";
        return $route;
    }
}