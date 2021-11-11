<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/validation',[App\Http\Controllers\payments\mpesa\MPESAResponsesController::class,'validation']);
Route::post('/confirmation',[App\Http\Controllers\payments\mpesa\MPESAResponsesController::class,'confirmation']);
Route::post('/stkPushUrl',[App\Http\Controllers\payments\mpesa\MPESAResponsesController::class,'stkPushUrl']);
Route::post('/b2cresults',[App\Http\Controllers\payments\mpesa\MPESAResponsesController::class,'b2cresults']);
Route::post('/b2ctimeout',[App\Http\Controllers\payments\mpesa\MPESAResponsesController::class,'b2ctimeout']);