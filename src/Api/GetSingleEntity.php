<?php

namespace src\api;

class GetSingleEntity
{
    private \src\Repositories\GetSingleEntityRepository $repository;

    public function __construct(int $id)
    {
        return $this->repository->getEntityById(\src\Entities\User::class, $id);
    }
}