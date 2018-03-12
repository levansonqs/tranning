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

Route::namespace('Admin')->prefix('admin')->group(function(){
	Route::prefix('index')->group(function() {
		Route::get('index' , [
			'uses' => 'IndexController@index',
			'as'   => 'admin.index.index'
		]);
	});

	Route::prefix('user')->group(function(){
		Route::get('index',[
			'uses'=>'UserController@index',
			'as'=>'admin.user.index'
		]);
	});
});


