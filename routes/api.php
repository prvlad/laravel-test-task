<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

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

Route::controller(UserController::class)->group(function () {
    Route::get('/user/{userId}', 'getUser');
    Route::get('/user/{userId}/delete', 'deleteUser');
    Route::post('/user/create', 'createUser');
    Route::post('/user/update', 'updateUser');
});
