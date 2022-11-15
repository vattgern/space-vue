<?php

use App\Http\Controllers\API\LetterController;
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

// Auth
Route::post('/reg', [AuthController::class,'registration']);
Route::post('/login',[AuthController::class,'login'])->name('login');
// Users routes
Route::get('/users',[UserController::class,'all']);
Route::delete('/users/{id}',[UserController::class,'destroy']);
// Letters
Route::get('/letters',[LetterController::class,'all']);
Route::get('/letters/{id}',[LetterController::class,'index']);
Route::post('/letter',[LetterController::class,'store']);
Route::delete('/letters/{id}',[LetterController::class,'destroy']);
