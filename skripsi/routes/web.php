<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\CriteriaDetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

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


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [CriteriaController::class, 'index']);
	Route::get('dashboard', function () {
		return view('criteria.index');
	})->name('dashboard');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});

Route::resource('/criteria', CriteriaController::class)->except('show');
Route::get('criteria/destroy/{id}', [Criteriacontroller::class, 'destroy'])->name('criteria.destroy');

Route::resource('/criteriadetail', CriteriaDetailController::class)->except('show');
Route::get('criteriadetail/destroy/{id}', [CriteriaDetailcontroller::class, 'destroy'])->name('criteriadetail.destroy');

Route::resource('/candidates', CandidateController::class )->except('show');
Route::get('candidates/destroy/{id}', [CandidateController::class, 'destroy'])->name('candidates.destroy');

Route::get('/result', [ResultsController::class, 'index']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');