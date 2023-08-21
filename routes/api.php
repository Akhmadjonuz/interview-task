<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;


// no authentication routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::prefix('product')->group(function () {
    Route::get('/show', [ProductController::class, 'show']);
    Route::get('/search', [ProductController::class, 'search']);
});

Route::get('/show{id?}', [CategoryController::class, 'show']);
Route::get('/show{id?}', [BrandController::class, 'show']);


// Authenticated routes
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Product routes
    Route::prefix('product')->group(function () {
        Route::post('/create', [ProductController::class, 'create']);
        Route::put('/update', [ProductController::class, 'update']);
    });

    // Category routes
    Route::prefix('category')->group(function () {
        Route::post('/create', [CategoryController::class, 'create']);
        Route::put('/update', [CategoryController::class, 'update']);
        Route::delete('/delete', [CategoryController::class, 'delete']);
    });

    // Brand routes
    Route::prefix('brand')->group(function () {
        Route::post('/create', [BrandController::class, 'create']);
        Route::put('/update', [BrandController::class, 'update']);
        Route::delete('/delete', [BrandController::class, 'delete']);
    });
});