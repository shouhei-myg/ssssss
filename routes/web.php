<?php

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

Auth::routes();

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');

Route::group(['prefix'=>'user'], function () {
    Route::get('index', 'UserController@index')->name('user.index');
  });

Route::get('create', 'UserController@create')->name('user.create');