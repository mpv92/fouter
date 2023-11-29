<?php

namespace MJ\Api\Users;


use MJ\Lib\Http\Response;

class SingleUser extends Response
{
    public function __construct(public int $id)
    {
        return $this->id;
    }
}