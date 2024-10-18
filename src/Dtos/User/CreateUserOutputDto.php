<?php

namespace Dtos\User;

use MJ\Lib\Dto\Dto;

class CreateUserOutputDto extends Dto
{
    public string $firstname;
    public string $lastname;
    public string $email;
}