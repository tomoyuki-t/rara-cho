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

Route::get('about', 'App\Http\Controllers\PagesController@about')->name('about');
Route::get('contact', 'App\Http\Controllers\PagesController@contact')->name('contact');

Route::get('/', 'App\Http\Controllers\ArticlesController@index')->name('home');
Route::resource('articles', 'App\Http\Controllers\ArticlesController');

//Route::get('/', 'App\Http\Controllers\WelcomeController@index')->name('home');
//Route::get('contact', 'App\Http\Controllers\PagesController@contact')->name('contact');
//Route::get('about', 'App\Http\Controllers\PagesController@about')->name('about');

//Route::get('articles', 'App\Http\Controllers\ArticlesController@index')->name('articles.index');
//Route::get('articles/create', 'App\Http\Controllers\ArticlesController@create')->name('articles.create');
//Route::get('articles/{id}', 'App\Http\Controllers\ArticlesController@show')->name('articles.show');
//Route::post('articles', 'App\Http\Controllers\ArticlesController@store')->name('articles.store');
//Route::get('articles/{id}/edit', 'App\Http\Controllers\ArticlesController@edit')->name('articles.edit');
//Route::patch('articles/{id}', 'App\Http\Controllers\ArticlesController@update')->name('articles.update');
//Route::delete('articles/{id}', 'App\Http\Controllers\ArticlesController@destroy')->name('articles.destroy');

