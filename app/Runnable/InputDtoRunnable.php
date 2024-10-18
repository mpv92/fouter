<?php

namespace App\Runnable;

use MJ\Lib\Router\Route;
use Symfony\Component\HttpFoundation\Request;

class InputDtoRunnable
{
    public static function run(Request $request, Route $routeInstance): Route
    {
        $inputDtoClassName = $routeInstance->getInputDto();
        var_dump($request->getContent());
        return $routeInstance;
    }
}