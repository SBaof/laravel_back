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

Route::get('/', 'HomeController@index');
Route::get('/pages/{id}', 'PagesController@show');

//Route::get('home', 'HomeController@index');

// Route::controllers([
//     'auth' => 'Auth\AuthController',
//     'password' => 'Auth\PasswordController',
// ]);

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::post('auth/login', 'Auth\AuthController@postLogin');

//1.创建一个路由组
//'prefix' => 'admin'表示路由组url前缀为admin
//'namespace' => 'Admin'表示'AdminHomeController@index'的命名空间是\App\Http\Controllers\Admin\AdminHomeController@index
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminHomeController@index');
    Route::resource('pages', 'PagesController');
    Route::resource('comments', 'CommentsController');
});

//comment
Route::post('comment/store', 'CommentsController@store');
