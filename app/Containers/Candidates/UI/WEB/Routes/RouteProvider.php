<?php

namespace App\Containers\Candidates\UI\WEB\Routes;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Containers\Candidates\UI\WEB\Controllers\CandidateController;



class RouteProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->candidatesRoute();
    }


    private function candidatesRoute(): void
    {
        Route::group(['prefix' => 'detail-page'], function () {
            Route::get('candidate/{id}', [CandidateController::class, 'getCandidate'])->name('show-candidate');
        });
    }

}
