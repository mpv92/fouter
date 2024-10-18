<?php

namespace MJ\Api\Users;

use MJ\Interfaces\GetSingleEntityByCriteriaRepositoryInterface;
use MJ\Lib\Http\HttpResponse;
use MJ\Lib\Http\Response;

class GetSingleUserByFirstname extends Response
{
    public function __construct(private GetSingleEntityByCriteriaRepositoryInterface $getUserByCriteriaRepository)
    {
    }

    public function __invoke(string $firstName): HttpResponse
    {
        $user = $this->getUserByCriteriaRepository->getByCriteria(['firstName' => $firstName]);
        return new HttpResponse($user);
    }
}