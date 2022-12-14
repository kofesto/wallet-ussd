<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeleController;

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

Route::post('/ussd',[TeleController::class,'ussd']);

Route::post('/account',[TeleController::class,'account']);

Route::get('/raa', function () {
    return json_encode([1, 2, 3]);
});

Route::get('/show',[TeleController::class,'show']);
