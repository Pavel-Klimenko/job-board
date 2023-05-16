<?php

namespace App\Ship\Contracts;


interface CacheContract
{
    public function putObjectIntoCache($keyName, $object);
    public function getObjectIntoCache($keyName);
    public function deleteKeyFromCache($keyName);
}
