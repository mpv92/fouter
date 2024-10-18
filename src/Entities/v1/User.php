<?php

namespace MJ\Entities\v1;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public int $id;
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $password;
    public string $salt;
}