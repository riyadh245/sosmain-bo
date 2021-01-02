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
Route::get('/verifyUser/{username}', [App\Http\Controllers\UserController::class, 'verifyUser']);
Route::post('/login',[App\Http\Controllers\ApiController::class, 'login']);
Route::post('/addPatient',[App\Http\Controllers\ApiController::class, 'addPatient']);
Route::get('/centers-list',[App\Http\Controllers\ApiController::class,'getCenters']);

