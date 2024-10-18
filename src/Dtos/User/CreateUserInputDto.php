<?php

namespace Dtos\User;

use MJ\Lib\Dto\Dto;

class CreateUserInputDto extends Dto
{
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $password;
}