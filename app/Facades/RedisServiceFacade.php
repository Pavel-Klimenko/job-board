<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class RedisServiceFacade extends Facade {
    protected static function getFacadeAccessor() { return 'redisService'; }
}
