<?php

namespace MJ\Api\Users;

use MJ\Lib\Http\Response;

class GetUserByIdAndSpecificGroup extends Response
{
    public function __construct(public int $id, public string $group)
    {
        return [$this->id, $this->group];
    }
}