<?php

use App\Http\Controllers\FaceBookController;
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

//Route::get('/', function () {
//    return view('index');
//});

Route::get("/",function (){
    return view("index");
});

Route::get("/{any}",function (){
    return view("index");
})->where('any','.*');
//})->middleware('auth');



Route::post('/send-quote',[\App\Http\Controllers\HomeController::class, 'sendQuote']);
Route::post('/send-numbers-mail',[\App\Http\Controllers\HomeController::class, 'sendNumberMAil']);
Route::post('/save-progress',[\App\Http\Controllers\HomeController::class, 'saveUserProgress']);

Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [FaceBookController::class, 'callbackFromFacebook'])->name('callback');
});
