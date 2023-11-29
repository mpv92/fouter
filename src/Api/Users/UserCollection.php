<?php

namespace MJ\Api\Users;

use MJ\Lib\Http\Response;

class UserCollection extends Response
{
    public function __construct()
    {
        return new \http\Env\Response();
    }
}