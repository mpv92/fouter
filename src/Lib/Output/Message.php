<?php

namespace MJ\Lib\Output;

use app\App;
use JetBrains\PhpStorm\NoReturn;

class Message
{
    const ERROR = 'error';
    const WARNING = 'warning';
    const SUCCESS = 'success';
    const INFO = 'info';
    const DEBUG = 'debug';

    public function __construct(private string $type, protected string $title, protected string $message, protected ?array $callstack)
    {
    }

    public function render(): self
    {
        require_once __DIR__ . "/Html/{$this->type}Message.php";
        return $this;
    }

    public function log(): self
    {
        //log
    }

    #[NoReturn] public function shutdown(int $errorCode = null): void
    {
        App::instance()->sendStatusCode($errorCode);
    }
}