<?php

namespace App\Interpreter;

use MJ\Lib\Router\Route;

interface InterpreterInterface
{
    public function interpret(Route $route): void;
}