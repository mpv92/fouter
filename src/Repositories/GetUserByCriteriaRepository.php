<?php

namespace MJ\Repositories;

use MJ\Entities\User;
use MJ\Interfaces\GetSingleEntityByCriteriaRepositoryInterface;
use MJ\Interfaces\GetSingleEntityRepositoryInterface;
use MJ\Lib\Entity\Model;

class GetUserByCriteriaRepository implements GetSingleEntityByCriteriaRepositoryInterface
{
    public function __construct(private GetSingleEntityRepositoryInterface $getSingleEntityRepository)
    {
    }

    public function getByCriteria(array $criteria): Model
    {
        return $this->getSingleEntityRepository->getEntityById(
            'bla',
            1
        );
    }
}