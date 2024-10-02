<?php

use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\StudentController;
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

Route::group(['prefix' => 'tasks'], function () {
    Route::get('/', [TaskController::class, 'index']);
    Route::post('/', [TaskController::class, 'store']);
    Route::get('/{id}', [TaskController::class, 'show']);
    Route::put('/{id}', [TaskController::class, 'update']);
    Route::delete('/{id}', [TaskController::class, 'destroy']);
});

Route::group(['prefix' => 'students'], function () {
    Route::get('/', [StudentController::class,'index']);
    Route::post('/', [StudentController::class,'store']);
    Route::get('/{id}', [StudentController::class,'show']);
    Route::put('/{id}', [StudentController::class,'update']);
    Route::delete('/{id}', [StudentController::class,'delete']);
});