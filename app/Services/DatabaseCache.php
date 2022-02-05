<?php

namespace App\Services;

use App\Contracts\CacheContract;
use Illuminate\Support\Facades\Cache;

class DatabaseCache implements CacheContract
{

    public function putObjectIntoCache($keyName, $object)
    {
        Cache::store('database')->put($keyName, serialize($object));
    }


    public function getObjectIntoCache($keyName)
    {
        $cachedObject = Cache::store('database')->get($keyName);
        return unserialize($cachedObject);
    }


    public function deleteKeyFromCache($keyName) {
        if (Cache::store('database')->get($keyName)) {
            Cache::store('database')->forget($keyName);
        }
    }


}
