<?php

namespace MJ\Middlewares\Users;

use MJ\Lib\Http\Middleware;
use MJ\Lib\Router\Route;
use Symfony\Component\HttpFoundation\Request;

class AuthenticateBeforeCreateMiddleware extends Middleware
{
    public function __invoke(Request $request, Route $route): ?Route
    {
        if (1 === 1) {
            return $route;
        } else {
            return null;
        }
    }
}