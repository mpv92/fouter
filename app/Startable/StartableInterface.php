<?php

namespace App\Startable;

use MJ\Lib\Router\Endpoint;
use MJ\Lib\Router\Route;

interface StartableInterface
{
    public function start(): Route;
}