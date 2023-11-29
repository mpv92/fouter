<?php
use Symfony\Component\HttpFoundation\Request;
use \MJ\Lib\Router\Router;

require_once __DIR__ . '/routes.php';

$request = Request::createFromGlobals();
$assumedTargetWithParams = Router::assume($request->getMethod(), $request->getRequestUri());

if(null === $assumedTargetWithParams) {
    return (new \MJ\Responses\NotFoundResponse())->send();
}

/**
 * @var \MJ\Lib\Router\Route $routeInstance
 */
$routeInstance = $assumedTargetWithParams[0];
$routeInstance->setRequest($request);
$routeInstance->setRouteParameters($assumedTargetWithParams[1]);

//start sequence
if($beforeMiddleware = $routeInstance->getBeforeMiddleware()) {
    $beforeMiddleware = new $beforeMiddleware();
    $routeInstance = $beforeMiddleware($request, $routeInstance);
}

if(isset($routeInstance) && $inputDto = $routeInstance->getInputDto())
{
    
}




var_dump($routeInstance);
//$instance = new $targetClass(...$params);

//echo $instance;