<?php

namespace MJ\Lib\Feature;

class Context
{
    public function __construct(private string $context = "")
    {
    }

    public function code(callable $callable) {
        echo $callable;
    }
}