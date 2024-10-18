<?php

namespace App\Runnable;

use MJ\Lib\Router\Route;
use Symfony\Component\HttpFoundation\Request;

class OutputDtoRunnable
{
    public static function run(Request $request, Route $routeInstance): Route
    {
        $outputDto = $routeInstance->getOutputDto();
        //todo: do validation or whatever
        return $routeInstance;
    }
}