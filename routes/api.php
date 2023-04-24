<?php

use App\Http\Controllers\Api_Cotrollers\BlindController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api_Cotrollers\AlarmController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


// this is routes for blind personal information .....

Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'blind'], function ($router) {

    Route::post('/register', [BlindController::class,'register']);
    Route::post('/login', [BlindController::class,'login']);
    Route::post('/logout',[BlindController::class,'logout']);
    Route::get('/profile',[BlindController::class,'blindProfile']);
    Route::post('/insertNum',[\App\Http\Controllers\Api_Cotrollers\CallingController::class,'addNumber']);
    Route::get('/call/{name}',[\App\Http\Controllers\Api_Cotrollers\CallingController::class,'getNumber']);


});

// this is routes for volunteer personal information .....


Route::group(['prefix' => 'Volunteer'], function ($router) {

    Route::post('/register', [\App\Http\Controllers\Api_Cotrollers\VolunterController::class,'register']);
    Route::post('/login',  [\App\Http\Controllers\Api_Cotrollers\VolunterController::class,'login']);


});


// api resources for alarm table for blind ?
Route::group(['prefix'=>'blind'],function (){
    Route::apiResource('/{blind}/alarms',AlarmController::class);
    Route::get('/name',function (){
        return response()->json("kkkkk");
    });
    Route::post('/storealarm',  [\App\Http\Controllers\Api_Cotrollers\AlarmController::class,'create']);
});

