<?php

namespace App\Runnable;

use MJ\Lib\Router\Route;
use Symfony\Component\HttpFoundation\Request;

class InputDtoRunnable
{
    public static function run(Request $request, Route $routeInstance): Route
    {
        $inputDto = $routeInstance->getInputDto();
        //todo: do validation or whatever
        return $routeInstance;
    }
}