<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;


Route::post('login',[LoginController::class,'login']);

Route::get('categories/{id}',[CategoryController::class,'show']);
Route::get('products',[ProductController::class,'index']);
Route::get('products/{id}',[ProductController::class,'show']);

Route::middleware('auth:sanctum')->group(function (){
    Route::post('categories',[CategoryController::class,'store']);
    Route::put('categories/{id}',[CategoryController::class,'update']);
    Route::delete('categories/{id}',[CategoryController::class,'destroy']);
});
