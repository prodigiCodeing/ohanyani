<?php

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


Route::post('/send-quote',[\App\Http\Controllers\HomeController::class, 'sendQuote']);
Route::post('/send-numbers-mail',[\App\Http\Controllers\HomeController::class, 'sendNumberMAil']);
Route::post('/save-progress',[\App\Http\Controllers\HomeController::class, 'saveUserProgress']);
