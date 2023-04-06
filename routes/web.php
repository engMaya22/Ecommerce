<?php

use App\Http\Controllers\User\UserGroupController;
use App\Http\Controllers\UserController;
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
Route::group(['prefix' => 'groups'], function () {
    Route::get('/',[UserGroupController::class ,'index']);
    Route::get('/create',[UserGroupController::class , 'create']);
    Route::post('store',[UserGroupController::class , 'store']);
    Route::delete('delete/{id}',[UserGroupController::class , 'destroy']);

});






Route::group(['prefix' => 'users'], function () {
    Route::get('/',[UserController::class ,'index']);
    Route::get('show/{id}',[UserController::class ,'show']);
    Route::get('/create',[UserController::class ,'create']);
    Route::post('store',[UserController::class ,'store']);
    Route::get('edit/{id}',[UserController::class ,'edit']);
    Route::put('update/{id}',[UserController::class ,'update']);
    Route::delete('delete/{id}',[UserController::class ,'destroy']);



});
// Route::resource('products',[ProductController::class ,'index']);

 Route::resource('users',UserController::class);



