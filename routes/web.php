<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


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



Route::group(['prefix' => 'form'], function () {
    Route::view('form-add-review', 'forms.addReview')->name('form-add-review');
});


Route::get('logout', [Controllers\Auth\LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Auth::routes();