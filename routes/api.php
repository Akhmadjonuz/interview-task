<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\api\AuthController;



Route::post('/login', [AuthController::class, 'login']);
