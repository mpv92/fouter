<?php

require '../vendor/autoload.php';

\MJ\Api\Users\SingleUser::route('get', 'users/int:user_id');
\MJ\Api\Users\GetSingleUserByFirstname::route('get', 'users/string:firstname');
\MJ\Api\Users\UserCollection::route('get', 'users');

\MJ\Api\Users\GetUserByIdAndSpecificGroup::get('/users/int:user_id/group/string:group')
    ->output(\Dtos\User\CreateUserOutputDto::class);

\MJ\Api\Users\CreateUser::post('/users')
    ->input(\Dtos\User\CreateUserInputDto::class)
    ->output(\Dtos\User\CreateUserOutputDto::class)
    ->before(\MJ\Middlewares\Users\AuthenticateBeforeCreateMiddleware::class);