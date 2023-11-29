<?php

namespace MJ\Lib\Http;

use MJ\Lib\Router\Endpoint;

class Response extends Endpoint
{
    public function __toString(): string
    {
        return json_encode($this);
    }
}