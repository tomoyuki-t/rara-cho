<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ArticlesController;

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

Route::get('/', 'App\Http\Controllers\WelcomeController@index');
Route::get('contact', 'App\Http\Controllers\PagesController@contact');
Route::get('about', 'App\Http\Controllers\PagesController@about');

Route::get('articles', 'App\Http\Controllers\ArticlesController@index');
Route::get('articles/create', 'App\Http\Controllers\ArticlesController@create');
Route::get('articles/{id}', 'App\Http\Controllers\ArticlesController@show');
Route::post('articles', 'App\Http\Controllers\ArticlesController@store');
Route::get('articles/{id}/edit', 'App\Http\Controllers\ArticlesController@edit');
Route::patch('articles/{id}', 'App\Http\Controllers\ArticlesController@update');