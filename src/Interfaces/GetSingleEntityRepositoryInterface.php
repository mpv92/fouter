<?php

namespace MJ\Interfaces;

use MJ\Lib\Entity\Model;

interface GetSingleEntityRepositoryInterface
{
    public function getEntityById(string $classname, mixed $id): Model;
}