<?php

namespace App\Containers\Vacancies\UI\WEB\Routes;

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
        Route::get('browse-job', [VacancyController::class, 'getVacancies'])->name('browse-job');

        Route::group(['prefix' => 'detail-page'], function () {
            Route::get('vacancy/{id}', [VacancyController::class, 'getVacancy'])->name('show-vacancy');
        });
    }
}
