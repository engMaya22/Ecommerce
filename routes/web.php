<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\UserGroupController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
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
 //Login
Route::get('login',[LoginController::class , 'login'])->name('login');
Route::post('login',[LoginController::class , 'authenticate'])->name('login.confirm');
Route::group(['middleware'=> 'auth'],function(){
    Route::get('dashboard', function () {
        return view('welcome');
    });
    
   
    Route::get('logout',[LoginController::class , 'logout'])->name('logout');
    
    
    Route::resource('users', UserController::class);
    
    Route::group(['prefix' => 'groups'], function () {
        Route::get('/',[UserGroupController::class ,'index']);
        Route::get('/create',[UserGroupController::class , 'create']);
        Route::post('store',[UserGroupController::class , 'store']);
        Route::delete('delete/{id}',[UserGroupController::class , 'delete']);
    
    });
    Route::resource('categories',CategoryController::class);
    Route::resource('products',ProductController::class);
}
   
    
);





