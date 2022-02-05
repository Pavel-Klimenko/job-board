<?php

namespace App\Services;

use App\Contracts\CacheContract;
use Illuminate\Support\Facades\Redis;

class RedisCache implements CacheContract
{

    //сделать проверку подключен ли redis

//    public function __construct()
//    {
//        Redis::connect('localhost');
//    }


    public function putObjectIntoCache($keyName, $object)
    {
        Redis::set($keyName, serialize($object));
    }


    public function getObjectIntoCache($keyName)
    {
        $value = Redis::get($keyName);
        return unserialize($value);
    }

    public function deleteKeyFromCache($keyName) {

    }



}
