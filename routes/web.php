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

//Login Info
Route::get('/login','App\Http\Controllers\UserController@login')->name('login');
Route::post('/checklogin','App\Http\Controllers\UserController@checklogin');
Route::get('/logout','App\Http\Controllers\UserController@logout')->name('logout');

//Registration

Route::get('/form','App\Http\Controllers\UserController@form')->name('form');
Route::post('/save','App\Http\Controllers\UserController@save')->name('saveUser');

//Home

Route::get('/home','App\Http\Controllers\UserController@home')->name('home');
Route::get('/search','App\Http\Controllers\UserController@search')->name('search');
Route::get('/filter','App\Http\Controllers\UserController@filter')->name('filter');
Route::get('/view/{id?}','App\Http\Controllers\UserController@view')->name('viewUser');
Route::post('/add_friend/{id?}','App\Http\Controllers\UserController@addFriend')->name('addFriend');

// Match
Route::get('/match','App\Http\Controllers\UserController@match')->name('match');




