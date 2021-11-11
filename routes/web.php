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
Route::get('/stkblade', function () {
    return view('stkinitial');
});
Route::get('/B2c', function () {
    return view('B2c');
});



Route::post('/get_token',[App\Http\Controllers\payments\mpesa\MpesaController::class,'getAccessToken']);
Route::post('/registerurls',[App\Http\Controllers\payments\mpesa\MpesaController::class,'RegisterURLS']);
Route::post('/simulateTransaction',[App\Http\Controllers\payments\mpesa\MpesaController::class,'SimulateTranscation']);
Route::post('/stkpushTransaction',[App\Http\Controllers\payments\mpesa\MpesaController::class,'STKTranscation']);
Route::post('/B2cTransaction',[App\Http\Controllers\payments\mpesa\MpesaController::class,'B2CTranscation']);