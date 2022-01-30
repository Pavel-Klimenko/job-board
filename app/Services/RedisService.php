<?php

namespace App\Services;
use Illuminate\Support\Facades\Redis;

class RedisService
{

    public function __construct()
    {
        Redis::connect('localhost');
    }


    public function putObjectIntoCache($keyName, $object)
    {
        Redis::set($keyName, serialize($object));
    }


    public function getObjectIntoCache($keyName)
    {
        $value = Redis::get($keyName);
        return unserialize($value);
    }

}
