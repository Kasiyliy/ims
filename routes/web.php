<?php

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

Route::group(['middleware'=>'auth'], function(){
    Route::get('/home', ['as' => 'home' , 'uses' => 'HomeController@index']);

    Route::group(['middleware' => 'admin'], function(){

        Route::get('/users', ['as' => 'user.index' , 'uses' => 'UserController@index']);
        Route::get('/users/create', ['as' => 'user.create' , 'uses' => 'UserController@create']);
        Route::post('/users/store', ['as' => 'user.store' , 'uses' => 'UserController@store']);
        Route::get('/users/edit/{id}', ['as' => 'user.edit' , 'uses' => 'UserController@edit'])->where('id', '[0-9]+');
        Route::post('/users/update/{id}', ['as' => 'user.update' , 'uses' => 'UserController@update'])->where('id', '[0-9]+');
        Route::post('/users/updatePassword/{id}', ['as' => 'user.updatePassword' , 'uses' => 'UserController@updatePassword'])->where('id', '[0-9]+');
        Route::post('/users/delete/{id}', ['as' => 'user.delete' , 'uses' => 'UserController@delete'])->where('id', '[0-9]+');

        Route::get('/roles', ['as' => 'role.index' , 'uses' => 'RoleController@index']);
        Route::get('/roles/edit/{id}', ['as' => 'role.edit' , 'uses' => 'RoleController@edit'])->where('id', '[0-9]+');
        Route::post('/roles/update/{id}', ['as' => 'role.update' , 'uses' => 'RoleController@update'])->where('id', '[0-9]+');

        Route::get('/spheres/create', ['as' => 'sphere.create' , 'uses' => 'SphereController@create']);
        Route::post('/spheres/store', ['as' => 'sphere.store' , 'uses' => 'SphereController@store']);
        Route::post('/spheres/delete/{id}', ['as' => 'sphere.delete' , 'uses' => 'SphereController@delete'])->where('id', '[0-9]+');
        Route::get('/spheres/edit/{id}', ['as' => 'sphere.edit' , 'uses' => 'SphereController@edit'])->where('id', '[0-9]+');
        Route::post('/spheres/update/{id}', ['as' => 'sphere.update' , 'uses' => 'SphereController@update'])->where('id', '[0-9]+');

        Route::get('/projects/create', ['as' => 'project.create' , 'uses' => 'ProjectController@create']);
        Route::post('/projects/store', ['as' => 'project.store' , 'uses' => 'ProjectController@store']);
        Route::post('/projects/delete/{id}', ['as' => 'project.delete' , 'uses' => 'ProjectController@delete'])->where('id', '[0-9]+');
        Route::get('/projects/edit/{id}', ['as' => 'project.edit' , 'uses' => 'ProjectController@edit'])->where('id', '[0-9]+');
        Route::post('/projects/update/{id}', ['as' => 'project.update' , 'uses' => 'ProjectController@update'])->where('id', '[0-9]+');


    });
    Route::get('/spheres', ['as' => 'sphere.index' , 'uses' => 'SphereController@index']);

    Route::get('/projects', ['as' => 'project.index' , 'uses' => 'ProjectController@index']);


});