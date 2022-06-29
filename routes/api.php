<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RedeemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/users', [UserController::class, 'store'])->name('user.store');
Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
        Route::post('/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.delete');
    });
    Route::group(['prefix' => 'hobbies'], function () {
        Route::get('/', [HobbyController::class, 'index'])->name('hobby.index');
        Route::post('/', [HobbyController::class, 'store'])->name('hobby.store');
        Route::get('/{id}', [HobbyController::class, 'show'])->name('hobby.show');
        Route::post('/{id}', [HobbyController::class, 'update'])->name('hobby.update');
        Route::delete('/{id}', [HobbyController::class, 'destroy'])->name('hobby.delete');
    });
});
