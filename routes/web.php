<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('collectTweets', [App\Http\Controllers\ClientController::class, 'collectTweets'])->name('collectTweets');
    
Route::get('readTweets', [App\Http\Controllers\ClientController::class, 'readTweets'])->name('readTweets');
