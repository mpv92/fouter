<?php

namespace MJ\Lib\Router;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Route
{
    public function __construct(
        private readonly string $requestMethod,
        private readonly string $uri,
        private readonly string $targetClassName,
        private ?string $inputDto = null,
        private ?string $outputDto = null,
        private ?string $beforeMiddleware = null,
        private ?string $afterMiddleware = null,
        private ?Request $request = null,
        private ?Response $response = null,
        private ?array $routeParameters = null
    )
    {
    }

    public function getRouteParameters(): ?array
    {
        return $this->routeParameters;
    }

    public function setRouteParameters(?array $routeParameters): void
    {
        $this->routeParameters = $routeParameters;
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    public function getResponse(): Response
    {
        return $this->response;
    }

    public function setResponse(Response $response): void
    {
        $this->response = $response;
    }

    public function input(string $inputDto): static
    {
        $this->inputDto = $inputDto;
        return $this;
    }

    public function output(string $outputDto): static
    {
        $this->outputDto = $outputDto;
        return $this;
    }

    public function before(string $beforeMiddleware): static
    {
        $this->beforeMiddleware = $beforeMiddleware;
        return $this;
    }

    public function after(string $afterMiddleware): static
    {
        $this->afterMiddleware = $afterMiddleware;
        return $this;
    }

    public function getRequestMethod(): string
    {
        return $this->requestMethod;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getTargetClassName(): string
    {
        return $this->targetClassName;
    }

    public function getInputDto(): ?string
    {
        return $this->inputDto;
    }

    public function getOutputDto(): ?string
    {
        return $this->outputDto;
    }

    public function getBeforeMiddleware(): ?string
    {
        return $this->beforeMiddleware;
    }

    public function getAfterMiddleware(): ?string
    {
        return $this->afterMiddleware;
    }
}