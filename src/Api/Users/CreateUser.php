<?php

namespace MJ\Api\Users;

use App\App;
use Dtos\User\CreateUserInputDto;
use Dtos\User\CreateUserOutputDto;
use MJ\Lib\Http\Response;

class CreateUser extends Response
{
    public function __invoke(CreateUserInputDto $createUserInputDto): CreateUserOutputDto
    {
        echo "test";
    }
}