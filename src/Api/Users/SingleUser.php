<?php

namespace MJ\Api\Users;


use MJ\Interfaces\GetSingleEntityRepositoryInterface;
use MJ\Lib\Feature\Feature;
use MJ\Lib\Http\HttpResponse;
use MJ\Lib\Http\Response;
use MJ\Entities\User;

class SingleUser extends Response
{
    public function __construct(private GetSingleEntityRepositoryInterface $getSingleEntityRepository)
    {

    }

    public function __invoke(int $user_id): HttpResponse
    {
        /**
         * @var $user User
         */
        $user = $this->getSingleEntityRepository->getEntityById('User', 1);
        return new HttpResponse($user);
    }
}