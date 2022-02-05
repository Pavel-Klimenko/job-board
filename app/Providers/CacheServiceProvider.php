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
        if (env('CURRENT_CACHE_SERVICE') == 'database') {
            $this->app->bind('App\Contracts\CacheContract','App\Services\DatabaseCache');
        } elseif(env('CURRENT_CACHE_SERVICE') == 'redis') {
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
