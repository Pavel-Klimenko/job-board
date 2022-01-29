<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class RedisServiceServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('redisService', function () {
            return new App\Services\RedisService();
        });
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
