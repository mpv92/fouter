<?php

namespace MJ\Responses;

use Symfony\Component\HttpFoundation\Response;

class NotFoundResponse extends Response
{
    public function __construct()
    {
        parent::__construct("Route not found.", 404);
    }
}