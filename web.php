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

Route::get('/hello', 'App\Http\Controllers\HelloController@index');
Route::get('view', 'App\Http\Controllers\HelloController@view');
Route::get('list', 'App\Http\Controllers\HelloController@list');
Route::get('escape', 'App\Http\Controllers\ViewController@escape');
Route::get('if', 'App\Http\Controllers\ViewController@if');
Route::get('unless', 'App\Http\Controllers\ViewController@unless');
Route::get('foreach_assoc', 'App\Http\Controllers\ViewController@foreach_assoc');
Route::get('foreach_loop', 'App\Http\Controllers\ViewController@foreach_loop');
Route::get('master', 'App\Http\Controllers\ViewController@master');
Route::get('comp', 'App\Http\Controllers\ViewController@comp');
Route::get('book', 'App\Http\Controllers\ViewController@book');
