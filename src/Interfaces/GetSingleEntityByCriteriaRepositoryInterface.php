<?php

namespace MJ\Interfaces;

use MJ\Lib\Entity\Model;

interface GetSingleEntityByCriteriaRepositoryInterface
{
    public function getByCriteria(array $criteria): Model;
}