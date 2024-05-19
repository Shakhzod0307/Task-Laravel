<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/',[AuthController::class,'login'])->name('login');
Route::post('login',[AuthController::class,'loginCheck'])->name('loginCheck');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth',AdminMiddleware::class])->group(function () {
    Route::resource('admin/categories',CategoriesController::class);
    Route::resource('admin/pages',PagesController::class);
    Route::resource('admin/products',ProductsController::class);
});






