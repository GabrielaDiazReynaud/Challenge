<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tasks','App\Http\Controllers\TasksController@index');
Route::post('/tasksAdd','App\Http\Controllers\TasksController@store');
Route::put('/tasksChange/{tasks}','App\Http\Controllers\TasksController@edit');
Route::delete('/tasksDeleteSelected','App\Http\Controllers\TasksController@destroySelected');
Route::delete('/tasksAll','App\Http\Controllers\TasksController@destroyAll');