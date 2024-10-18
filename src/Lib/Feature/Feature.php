<?php

namespace MJ\Lib\Feature;

#[\Attribute]
class Feature
{
    private static array $contexts = [];
    public function __construct(string $featureName)
    {
        var_dump($featureName);
    }

    public static function context(string $featureName): Context
    {
        if(key_exists($featureName, self::$contexts)) {
            return self::$contexts[$featureName];
        } else {
            return self::$contexts[$featureName] = new Context();
        }
    }
}