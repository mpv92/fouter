<?php

namespace App\Interpreter;

use MJ\Lib\Http\HttpResponse;
use MJ\Lib\Router\Endpoint;
use MJ\Lib\Router\Route;

class EndpointInterpreter
{
    public static function interpret(Route $route): void
    {
        $endpoint = $route->getEndpointInstance();
        if(is_callable($endpoint)) {
            //invoke
            $response = $endpoint(
                ...$route->getRouteParameters()
            );
            if ($response instanceof HttpResponse) {
                $response->contentType();
            }
            echo $response;
        }
    }
}