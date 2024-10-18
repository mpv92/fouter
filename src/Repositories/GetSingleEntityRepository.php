<?php

namespace MJ\Repositories;
use MJ\Entities\User;
use MJ\Interfaces\GetCollectionEntityRepositoryInterface;
use MJ\Interfaces\GetSingleEntityRepositoryInterface;
use MJ\Lib\Entity\Model;

class GetSingleEntityRepository implements GetSingleEntityRepositoryInterface
{
    public function __construct(private GetCollectionEntityRepositoryInterface $getCollectionEntityRepository)
    {
    }

    public function getEntityById(string $classname, mixed $id): Model
    {
        echo $this->getCollectionEntityRepository->getEntitiesByQuery('query');
        $user = new User();
        $user->id = 1;
        $user->firstname = "test";
        $user->lastname = "test123";
        return $user;
        //$this->getCollectionEntityRepository->getEntitiesByQuery('query');
    }
}