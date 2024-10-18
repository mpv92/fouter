<?php

namespace MJ\Lib\Router;

class Router
{
    public static array $routes;

    public static function route(
        string $requestMethod,
        string $uri,
        string $targetClassName,
        ?string $inputDto = null,
        ?string $outputDto = null,
        ?string $beforeMiddleware = null,
        ?string $afterMiddleware = null
    ): Route
    {
        $uri = self::cleanRequestUri($uri);
        $amountOfSegments = count(explode('/', $uri));
        $unifiedRequestMethod = self::unifyRequestMethod($requestMethod);
        return self::$routes[$unifiedRequestMethod][$amountOfSegments][$uri] = new Route(
            $unifiedRequestMethod,
            $uri,
            $targetClassName,
            $inputDto,
            $outputDto,
            $beforeMiddleware,
            $afterMiddleware
        );
    }

    public static function assume(string $requestMethod, string $requestedUri): ?array
    {
        $requestedUri = self::cleanRequestUri($requestedUri);
        $requestedUriSegments = explode('/', $requestedUri);
        $amountOfSegments = count($requestedUriSegments);
        $assumedRouteTarget = null;
        $parametersForAssumedTarget = [];
        $possibleRoutes = [];

        if(isset(self::$routes[self::unifyRequestMethod($requestMethod)][$amountOfSegments])) {
            $possibleRoutes = self::$routes[self::unifyRequestMethod($requestMethod)][$amountOfSegments];
        }

        foreach ($possibleRoutes as $routeIdentifier => $route) {
            $iterationRouteSegment = explode('/', $routeIdentifier);
            $hits = 0;
            foreach ($iterationRouteSegment as $index => $segment) {
                if (!str_contains($segment, ':')) {
                    if ($segment === $requestedUriSegments[$index]) {
                        $hits++;
                    }
                } else {
                    $explodedParameterDefinition = explode(':', $segment);
                    if ($explodedParameterDefinition[0] === self::getParameterTypeOfRequestedUriParameter($requestedUriSegments[$index])) {
                        $parametersForAssumedTarget[] = $requestedUriSegments[$index];
                        $hits++;
                    }
                }
            }
            if ($hits === $amountOfSegments) {
                $assumedRouteTarget = $route;
            }
        }
        if(null !== $assumedRouteTarget) {
            return [$assumedRouteTarget, $parametersForAssumedTarget];
        }
        return null;
    }

    private static function getParameterTypeOfRequestedUriParameter(string $parameter): string
    {
        if (is_numeric($parameter)) {
            return 'int';
        } else {
            return 'string';
        }
    }


    private static function unifyRequestMethod(string $requestMethod): string
    {
        return strtolower($requestMethod);
    }

    private static function cleanRequestUri(string $requestUri): string
    {
        if (str_starts_with($requestUri, '/')) {
            $requestUri = ltrim($requestUri, '/');
        }
        if (str_ends_with($requestUri, '/')) {
            $requestUri = rtrim($requestUri, '/');
        }
        return $requestUri;
    }
}