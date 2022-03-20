<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('test-email', [Controllers\JobController::class, 'enqueue'])->name('add-mail-to-queue');


Route::group(['prefix' => 'ajax'], function () {
    Route::post('get-vacancy',[Controllers\AjaxController::class, 'getVacancyById']);
});



Route::get('/', [Controllers\HomePageController::class, 'renderHomePage'])->name('homepage');
Route::get('browse-job', [Controllers\VacancyController::class, 'getVacancies'])->name('browse-job');
Route::get('candidates', [Controllers\CandidateController::class, 'getCandidates'])->name('candidates');
Route::get('contact', [Controllers\ContactController::class, 'renderContactPage'])->name('contact');
Route::post('contact-us', [Controllers\ContactController::class, 'addUserMessage'])->name('contact-us');


Route::group(['prefix' => 'detail-page'], function () {
    Route::get('vacancy/{id}', [Controllers\VacancyController::class, 'getVacancy'])->name('show-vacancy');
    Route::get('candidate/{id}', [Controllers\CandidateController::class, 'getCandidate'])->name('show-candidate');
});


Route::group(['prefix' => 'form'], function () {
    Route::view('form-add-review', 'forms.addReview')->name('form-add-review');
});


//company routes
Route::middleware(['company.area'])->group(function () {
    Route::group(['prefix' => 'form'], function () {
        Route::view('add-vacancy', 'forms.addVacancy')->name('add-vacancy');
    });

    Route::get('delete-vacancy', [Controllers\VacancyController::class, 'deleteVacancy'])
        ->name('delete-vacancy');

    Route::post('update-vacancy', [Controllers\VacancyController::class, 'updateVacancy'])
        ->name('update-vacancy');

    Route::group(['prefix' => 'create'], function () {
        Route::post('vacancy', [Controllers\VacancyController::class, 'createVacancy'])
            ->name('create-vacancy');
        Route::post('create-review', [Controllers\HomePageController::class, 'createUserReview'])
            ->name('create-review');
    });
});


//candidate routes
Route::middleware(['candidate.area'])->group(function () {
    Route::group(['prefix' => 'form'], function () {
        Route::view('add-candidate', 'forms.addCandidateCV')->name('add-candidate');
    });
    Route::group(['prefix' => 'create'], function () {
        Route::post('candidate', [Controllers\CandidateController::class, 'createCandidate'])->name('create-candidate');
    });
});



//Personal Area
Route::group(['prefix' => 'personal', 'middleware' => 'auth'], function () {
    Route::get('info', [Controllers\PersonalController::class, 'getPersonalInfo'])
        ->name('personal-info');
    Route::get('vacancies', [Controllers\PersonalController::class, 'getCompanyVacancies'])
        ->name('personal-vacancies');
    Route::get('interview-requests/{type}', [Controllers\PersonalController::class, 'getIterviewRequests'])
        ->name('interview-requests');
    Route::post('invite-to-interview', [Controllers\PersonalController::class, 'createInterviewInvite'])
        ->name('invite-to-interview');
    //статус отклика
    Route::get('change-advice-status/{ADVICE_ID}/{STATUS}', [Controllers\PersonalController::class, 'changeAdviceStatus'])
        ->name('change-advice-status');

    Route::post('upload-user-image', [Controllers\PersonalController::class, 'uploadUserImage'])
        ->name('upload-user-image');

    Route::post('update-user-info', [Controllers\PersonalController::class, 'updateUserInfo'])
        ->name('update-user-info');

 /*   Route::post('update-vacancy', [Controllers\PersonalController::class, 'updateUserInfo'])
        ->name('update-vacancy');*/
});


Route::get('personal', [Controllers\PersonalController::class, 'getCompanyVacancies'])
    ->name('personal')
    ->middleware('auth');

Route::get('logout', [Controllers\Auth\LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Auth::routes();


//Admin panel routes


//TODO: здесь сделать одни и те же методы, а внутри менять классы интерфейсом

Route::group(['prefix' => 'admin'], function () {
    Route::get('main', [Controllers\AdminController::class, 'renderAdminPanel'])
        ->name('admin-main');
    Route::get('main/{name}', [Controllers\AdminController::class, 'renderUserList'])
        ->name('admin-users');

    Route::post('admin-update-user', [Controllers\AdminController::class, 'updateUserInfo'])
        ->name('admin-update-user');

    Route::get('admin/vacancies', [Controllers\AdminController::class, 'renderVacanciesList'])
        ->name('admin-vacancies');

    Route::get('admin/reviews', [Controllers\AdminController::class, 'renderReviewsList'])
        ->name('admin-reviews');

    Route::get('user/{id}', [Controllers\AdminController::class, 'renderUser'])
        ->name('admin-profile');

    Route::get('vacancy/{id}', [Controllers\AdminController::class, 'renderVacancy'])
        ->name('admin-vacancy');

    Route::get('review/{id}', [Controllers\AdminController::class, 'renderReview'])
        ->name('admin-review');



    Route::post('admin-update-vacancy', [Controllers\AdminController::class, 'updateVacancy'])
        ->name('admin-update-vacancy');

    Route::post('admin-update-review', [Controllers\AdminController::class, 'updateReview'])
        ->name('admin-update-review');




    Route::get('admin-delete-entity', [Controllers\AdminController::class, 'deleteEntity'])
        ->name('admin-delete-entity');
    Route::get('admin-change-active-status', [Controllers\AdminController::class, 'changeActiveStatus'])
        ->name('admin-change-active-status');
});




//debug routs
Route::get('test', [Controllers\TestController::class, 'testMethod'])->middleware('auth');
Route::get('phpinfo', [Controllers\TestController::class, 'phpinfo'])->middleware('auth');




