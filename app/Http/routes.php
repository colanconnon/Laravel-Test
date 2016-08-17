<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/package', function() {
    return view('package');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('product', 'ProductController');

Route::resource('category', 'CategoryController');

Route::resource('todo', 'TodoController');

Route::resource('apimanagement', 'ApiManagementController');
