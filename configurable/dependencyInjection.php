<?php

use MJ\Api\Users\GetSingleUserByFirstname;
use MJ\Api\Users\SingleUser;
use MJ\Interfaces\GetCollectionEntityRepositoryInterface;
use MJ\Interfaces\GetSingleEntityByCriteriaRepositoryInterface;
use MJ\Interfaces\GetSingleEntityRepositoryInterface;
use MJ\Repositories\GetCollectionEntityRepository;
use MJ\Repositories\GetSingleEntityRepository;
use MJ\Repositories\GetUserByCriteriaRepository;

return [
    SingleUser::class => [
        GetSingleEntityRepositoryInterface::class => GetSingleEntityRepository::class
    ],
    GetSingleEntityRepository::class => [
        GetCollectionEntityRepositoryInterface::class => GetCollectionEntityRepository::class
    ],
    GetSingleUserByFirstname::class => [
        GetSingleEntityByCriteriaRepositoryInterface::class => GetUserByCriteriaRepository::class
    ],
    GetUserByCriteriaRepository::class => [
        GetSingleEntityRepositoryInterface::class => GetSingleEntityRepository::class
    ]
];
