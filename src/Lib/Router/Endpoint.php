<?php

namespace MJ\Lib\Router;

class Endpoint
{
    public static function route(
        string  $requestMethod,
        string  $uri,
        ?string $inputDto = null,
        ?string $outputDto = null,
        ?string $beforeMiddleware = null,
        ?string $afterMiddleware = null
    ): Route
    {
        return Router::route($requestMethod, $uri, static::class, $inputDto, $outputDto, $beforeMiddleware, $afterMiddleware);
    }

    public static function post(
        string  $uri,
        ?string $inputDto = null,
        ?string $outputDto = null,
        ?string $beforeMiddleware = null,
        ?string $afterMiddleware = null
    ): Route
    {
        return self::route('post', $uri, $inputDto, $outputDto, $beforeMiddleware, $afterMiddleware);
    }

    public static function get(
        string  $uri,
        ?string $inputDto = null,
        ?string $outputDto = null,
        ?string $beforeMiddleware = null,
        ?string $afterMiddleware = null
    ): Route
    {
        return self::route('get', $uri, $inputDto, $outputDto, $beforeMiddleware, $afterMiddleware);
    }

    public static function put(
        string  $uri,
        ?string $inputDto = null,
        ?string $outputDto = null,
        ?string $beforeMiddleware = null,
        ?string $afterMiddleware = null
    ): Route
    {
        return self::route('put', $uri, $inputDto, $outputDto, $beforeMiddleware, $afterMiddleware);
    }

    public static function patch(
        string  $uri,
        ?string $inputDto = null,
        ?string $outputDto = null,
        ?string $beforeMiddleware = null,
        ?string $afterMiddleware = null
    ): Route
    {
        return self::route('patch', $uri, $inputDto, $outputDto, $beforeMiddleware, $afterMiddleware);
    }

    public static function options(
        string  $uri,
        ?string $inputDto = null,
        ?string $outputDto = null,
        ?string $beforeMiddleware = null,
        ?string $afterMiddleware = null
    ): Route
    {
        return self::route('options', $uri, $inputDto, $outputDto, $beforeMiddleware, $afterMiddleware);
    }
}