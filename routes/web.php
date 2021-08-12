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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'BlogController@index');
Route::get('/post/{id}', 'BlogController@Post');
Route::get('/comentaries/store/{id}', 'CommentsController@store');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::prefix('/news')->group(function () {
       Route::get('/', 'NewsController@index');

        Route::any('/edit/{id}', 'NewsController@edit');
        Route::any('/update/{id}', 'NewsController@update');

        Route::any('/destroy-image/{id}', 'NewsController@destroyImage');

        Route::any('/add', 'NewsController@add');
        Route::any('/store', 'NewsController@store');
        Route::any('/delete/{id}', 'NewsController@destroy');
    });

    Route::prefix('/comentaries')->group(function () {
        Route::get('/', 'CommentsController@index');

        Route::any('/from-post/{id}', 'CommentsController@fromPost');

        Route::any('/edit/{id}', 'CommentsController@edit');
        Route::any('/update/{id}', 'CommentsController@update');

        Route::any('/delete/{id}', 'CommentsController@destroy');
    });    
});
