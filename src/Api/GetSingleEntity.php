<?php

namespace MJ\api;

class GetSingleEntity
{
    private \MJ\Repositories\GetSingleEntityRepository $repository;

    public function __construct(int $id)
    {
        return $this->repository->getEntityById(\MJ\Entities\User::class, $id);
    }
}