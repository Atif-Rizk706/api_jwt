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
    Route::get('/calls',[\App\Http\Controllers\Api_Cotrollers\CallingController::class,'getallunm']);


});

// this is routes for volunteer personal information .....


Route::group(['prefix' => 'Volunteer'], function ($router) {

    Route::post('/register', [\App\Http\Controllers\Api_Cotrollers\VolunterController::class,'register']);
    Route::post('/login',  [\App\Http\Controllers\Api_Cotrollers\VolunterController::class,'login']);
    Route::post('/logout',  [\App\Http\Controllers\Api_Cotrollers\VolunterController::class,'logout']);
    Route::get('/profile',  [\App\Http\Controllers\Api_Cotrollers\VolunterController::class,'volunterProfile']);

});


// api resources for alarm table for blind ?
Route::group(['prefix'=>'blind'],function (){

    Route::post('/insertNum',[\App\Http\Controllers\Api_Cotrollers\CallingController::class,'addNumber']);
    Route::get('/calls',[\App\Http\Controllers\Api_Cotrollers\CallingController::class,'getallunm']);
    Route::delete('/{$name}',[\App\Http\Controllers\Api_Cotrollers\CallingController::class,'deleteNumber']);
//    Route::get('/{$name}',[\App\Http\Controllers\Api_Cotrollers\CallingController::class,'deleteNumber']);

});

