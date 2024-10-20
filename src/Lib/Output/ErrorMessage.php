<?php

namespace MJ\Lib\Output;

class ErrorMessage extends Message
{
    public function __construct(string $title, string $message, ?array $callstack = null)
    {
        parent::__construct(Message::ERROR, $title, $message, debug_backtrace());
    }
}