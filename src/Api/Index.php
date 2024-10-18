<?php

namespace MJ\Api;

use MJ\Entities\v1\User;
use MJ\Lib\Router\Endpoint;

class Index extends Endpoint
{
    public function __invoke()
    {
        $user = new User();
    }
}