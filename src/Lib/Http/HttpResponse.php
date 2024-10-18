<?php

namespace MJ\Lib\Http;

class HttpResponse
{
    public function __construct(private $data)
    {
    }

    public function contentType()
    {
        header('Content-type: application/json');
    }

    public function __toString(): string
    {
        return json_encode($this->data);
    }
}