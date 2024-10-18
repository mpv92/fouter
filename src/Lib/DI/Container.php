<?php

namespace MJ\Lib\DI;

use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private array $instances = [];

    public function get(string $id)
    {
        if ($this->has($id)) {
            return $this->instances[$id];
        }
        throw new \Exception('not found');
    }

    public function has(string $id): bool
    {
        if (!array_key_exists($id, $this->instances)) {
            return false;
        }
        return true;
    }

    public function register(string $id, $instance): void
    {
        if (!$this->has($id)) {
            $this->instances[$id] = $instance;
        }
    }

    public function build(string $id) {
        $injectConfig = include(__DIR__ . '/../../../configurable/dependencyInjection.php');

        if(array_key_exists($id, $injectConfig)) {
            $toInjectParametersArray = $injectConfig[$id];
            foreach($toInjectParametersArray as $key => $value) {
                $toInjectParametersInstances[] = $this->build($value);
            }
            $new = new $id(...$toInjectParametersInstances);
        } else {
            $new = new $id;
        }
        $this->register($id, $new);
        return $new;
    }
}