<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;

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
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class,'me']);
    Route::post('/logout',[AuthController::class,'logout']);
});

// Авторизация&Регистрация
Route::post('/reg', [AuthController::class,'registration']);
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::get('/users',[UserController::class,'all']);
Route::delete('/users/{id}',[UserController::class,'destroy']);
