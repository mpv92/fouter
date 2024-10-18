<?php

namespace MJ\Entities;
use MJ\Lib\Entity\Model;
use MJ\Lib\Feature\Feature;

class User extends Model
{
    public int $id;
    public string $firstname;
    #[Feature('MAPI-1234')]
    public string $lastname;
}