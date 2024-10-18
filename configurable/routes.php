<?php

use Dtos\User\CreateUserInputDto;
use Dtos\User\CreateUserOutputDto;
use MJ\Api\Users\CreateUser;
use MJ\Api\Users\GetSingleUserByFirstname;
use MJ\Api\Users\SingleUser;
use MJ\Middlewares\Users\AuthenticateBeforeCreateMiddleware;

//directly with ::get
SingleUser::get('users/int:user_id');

//alternatively with ::route
GetSingleUserByFirstname::route('get', 'users/string:firstname')
    ->before(AuthenticateBeforeCreateMiddleware::class);


CreateUser::post('/users')
    ->input(CreateUserInputDto::class)
    ->output(CreateUserOutputDto::class)
    ->before(AuthenticateBeforeCreateMiddleware::class);