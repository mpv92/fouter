<?php

namespace App\Startable;

use App\App;
use App\Runnable\AfterMiddlewareRunnable;
use App\Runnable\BeforeMiddlewareRunnable;
use App\Runnable\DependencyInjectionRunnable;
use App\Runnable\InputDtoRunnable;
use App\Runnable\OutputDtoRunnable;
use MJ\Lib\DI\Container;
use MJ\Lib\Http\HttpResponse;
use MJ\Lib\Output\ErrorMessage;
use MJ\Lib\Router\Endpoint;
use MJ\Lib\Router\Route;
use MJ\Lib\Router\Router;
use Symfony\Component\HttpFoundation\Request;

class StartableRouter implements StartableInterface
{
    public function start(): Route
    {
        require_once __DIR__ . '/../../configurable/routes.php';

        $request = Request::createFromGlobals();
        $assumedTargetWithParams = Router::assume($request->getMethod(), $request->getRequestUri());

        if (null === $assumedTargetWithParams || !key_exists(0, $assumedTargetWithParams) || !key_exists(1, $assumedTargetWithParams)) {
            (new ErrorMessage('Route not found','This route does not exist. Please make sure that this route is configured correctly.', []))
                ->render()
                ->shutdown(404);
        }

        /**
         * @var Route $routeInstance
         */
        $routeInstance = $assumedTargetWithParams[0];
        $routeInstance->setRequest($request);
        $routeInstance->setRouteParameters($assumedTargetWithParams[1]);

        //start sequence
        if (App::instance()->runsWith(BeforeMiddlewareRunnable::class )) {
            $routeInstance = BeforeMiddlewareRunnable::run($request, $routeInstance);
        }
        if (App::instance()->runsWith(InputDtoRunnable::class)) {
            $routeInstance = InputDtoRunnable::run($request, $routeInstance);
        }
        if(App::instance()->runsWith(DependencyInjectionRunnable::class)) {
            $routeInstance = DependencyInjectionRunnable::run($request, $routeInstance);
        }
        if(App::instance()->runsWith(OutputDtoRunnable::class)) {
            $routeInstance = OutputDtoRunnable::run($request, $routeInstance);
        }
        if (App::instance()->runsWith(AfterMiddlewareRunnable::class)) {
            $routeInstance = AfterMiddlewareRunnable::run($request, $routeInstance);
        }

        return $routeInstance;
    }
}