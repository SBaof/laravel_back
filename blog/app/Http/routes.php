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

Route::get('/', function () {
    return redirect('/blog');
});

Route::get('/blog', 'BlogController@index');
Route::get('blog/{slug}', 'BlogController@showPost');

Route::get('/admin', function () {
    return redirect('/admin/post');
});

Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function () {
    resource('admin/post', 'PostController');
    resource('admin/tag', 'TagController', ['expect' => 'show']);
    get('admin/upload', 'UploadController@index');

    post('admin/upload/file', 'UploadController@uploadFile');
    delete('admin/upload/file', 'UploadController@deleteFile');
    post('admin/upload/folder', 'UploadController@createFolder');
    delete('admin/upload/folder', 'UploadController@deleteFolder');
});

//log in & out
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');
Route::post('/auth/login', 'Auth\AuthController@postLogin');

Route::get('hello/', function () {
    return "hello";
});
Route::get('/testPost', function () {
    $csrf_token = csrf_token();
    $form = <<<FORM
        <form action="/hello" method="POST">
            <input type="hidden" name="_token" value="{$csrf_token}">
            <input type="submit" value="Test"/>
        </form>
FORM;
    return $form;
});
Route::post('hello/', function () {
    return 'This is hello';
});
Route::match(['get', 'post'], 'hello/', function () {
    return 'match get/post';
});

Route::get('middle', ['middleware' => 'old:xxx', function() {
    return 'this is a test for OldMiddleWare';
}]);

