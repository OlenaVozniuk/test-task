<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;


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

Route::prefix('login')->middleware('guest:admin')->name('login.')->group(function () {
    Route::get('', [LoginController::class, 'showLoginForm'])->name('form');
    Route::post('', [LoginController::class, 'processLogin'])->name('process');
});

Route::get('logout', [LoginController::class, 'logout'])->middleware('auth:admin')->name('logout');

Route::middleware('auth:admin')->group(function () {
    Route::resources([
        'categories' => CategoryController::class,
        'posts'      => PostController::class
    ]);
});
