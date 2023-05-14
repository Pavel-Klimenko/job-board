<?php

namespace App\Containers\Vacancies\UI\WEB\_Routes;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Containers\Vacancies\UI\WEB\Controllers\VacancyController;



class RouteProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->vacanciesRoute();
    }


    private function vacanciesRoute(): void
    {
        Route::get('browse-job', [VacancyController::class, 'dddd'])->name('browse-job');


/*        Route::group([
            'prefix' => 'api/book/',
        ], function () {
            Route::get(
                '',
                [
                    'as' => 'api_book_list',
                    'uses' => BookController::class . '@list',
                ]
            );
        });*/
    }
}
