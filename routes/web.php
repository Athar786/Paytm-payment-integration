<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PaytmController;

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

Route::get('/payment','App\Http\Controllers\PaytmController@pay')->name('payment');
Route::post('/payment/status','App\Http\Controllers\PaytmController@paymentCallback');

