<?php

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserGroupController;
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

Route::get('groups',[UserGroupController::class , 'index']);
Route::get('groups/create',[UserGroupController::class , 'create']);
Route::post('groups',[UserGroupController::class , 'store']);
Route::delete('groups/{id}',[UserGroupController::class , 'destroy']);
Route::get('users', [UserController::class ,'index']);

