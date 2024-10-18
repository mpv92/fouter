<?php

namespace App;

use App\Interpreter\EndpointInterpreter;
use App\Interpreter\InterpreterInterface;
use App\Startable\StartableInterface;
use Exception;
use JetBrains\PhpStorm\NoReturn;
use MJ\Lib\Output\ErrorMessage;

class App
{
    private static $instance = null;
    private array $runsWith = [];
    private ?InterpreterInterface $defaultInterpreter = null;

    private function __construct()
    {
    }

    public static function instance(): App
    {
        if (self::$instance == null) {
            self::$instance = new App();
        }

        return self::$instance;
    }

    public function start(string $startableClassName): void
    {
        $startableInstance = new $startableClassName();
        if ($startableInstance instanceof StartableInterface) {
            $endpoint = $startableInstance->start();
            if(null !== $this->defaultInterpreter) {
                $this->defaultInterpreter->interpret($endpoint);
            } else {
                (new ErrorMessage('Interpreter Error','Interpretor not defined.'))
                    ->render()
                    ->shutdown(500);
            }
        } else {
            (new ErrorMessage('Startable Error','The startable class must implement StartableInterface'))
                ->render()
                ->shutdown(500);
        }
    }

    public function setInterpreter(string $interpreterClassName): void
    {
        $interpreter = new $interpreterClassName;
        if ($interpreter instanceof InterpreterInterface) {
            $this->defaultInterpreter = $interpreter;
        } else {
            (new ErrorMessage('Interpreter Error', 'The given interpreter class must implement interpreter interface'))
                ->render()
                ->shutdown(500);
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
        //exit();
    }

    #[NoReturn]
    public function shutdown($logKey = null, $logValue = null): void
    {
        if ($logKey && $logValue) {
            echo "<pre>";
        }
        if ($logKey) {
            echo "<b>$logKey</b>";
        }
        if ($logValue) {
            var_dump($logValue);
        }
        if ($logKey && $logValue) {
            echo "</pre>";
        }
        exit();
    }

    public function runsWith(string $runnableClassname): bool
    {
        if (in_array($runnableClassname, $this->runsWith)) {
            return true;
        }
        return false;
    }
}