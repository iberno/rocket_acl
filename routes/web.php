<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('permissions', 'ACL\PermissionController', ['except' => 'show']);
Route::resource('roles', 'ACL\RoleController', ['except' => 'show']);
Route::resource('users', 'ACL\UserController', ['except' => 'show']);
Route::get('/home', 'HomeController@index');
