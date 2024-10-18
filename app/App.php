<?php

namespace App;

use App\Interpreter\EndpointInterpreter;
use App\Startable\StartableInterface;
use JetBrains\PhpStorm\NoReturn;

class App
{
    private static $instance = null;
    private array $runsWith = [];
    private function __construct()
    {
    }

    public static function instance(): App
    {
        if (self::$instance == null)
        {
            self::$instance = new App();
        }

        return self::$instance;
    }

    public function start(string $startableClassName): void
    {
        $startableInstance = new $startableClassName();
        if($startableInstance instanceof StartableInterface) {
            $endpoint = $startableInstance->start();
            EndpointInterpreter::interpret($endpoint);
        }
    }

    public function addRunnable(string $runnableClassname): void
    {
        $this->runsWith[] = $runnableClassname;
    }

    public function configureRunnables(array $runnables): void
    {
        $this->runsWith = $runnables;
    }

    #[NoReturn]
    public function sendStatusCode(int $statusCode): void
    {
        http_response_code($statusCode);
        exit();
    }

    #[NoReturn]
    public function shutdown($logKey=null, $logValue=null): void
    {
        if($logKey && $logValue) {
            echo "<pre>";
        }
        if($logKey) {
            echo "<b>$logKey</b>";
        }
        if($logValue) {
            var_dump($logValue);
        }
        if($logKey && $logValue) {
            echo "</pre>";
        }
        exit();
    }

    public function runsWith(string $runnableClassname): bool
    {
        if(in_array($runnableClassname, $this->runsWith)) {
            return true;
        }
        return false;
    }
}