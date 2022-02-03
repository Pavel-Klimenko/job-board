<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class CacheServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (env('CURRENT_OPERATIONAL_SYSTEM') == 'windows') {
            $this->app->bind('App\Contracts\CacheContract','App\Services\DatabaseCache');
        } else {
            $this->app->bind('App\Contracts\CacheContract','App\Services\RedisCache');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
