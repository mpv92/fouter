<?php

namespace MJ\Api\Users;

use MJ\Lib\Http\Response;

class GetSingleUserByFirstname extends Response
{

    public function __construct(public string $firstname)
    {
        return $this->firstname;
    }
}