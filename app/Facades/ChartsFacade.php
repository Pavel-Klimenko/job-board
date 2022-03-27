<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ChartsFacade extends Facade {
    protected static function getFacadeAccessor() { return 'charts'; }
}
