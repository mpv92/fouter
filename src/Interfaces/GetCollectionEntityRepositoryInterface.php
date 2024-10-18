<?php

namespace MJ\Interfaces;

interface GetCollectionEntityRepositoryInterface
{
    public function getEntitiesByQuery(string $query);
}