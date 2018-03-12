<?php
Route::get('/', function () {
	// return view('welcome');
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

	Route::prefix('category')->group(function(){
		Route::get('index',[
			'uses'=>'CategoryController@index',
			'as'=>'admin.category.index'
		]);

		Route::post('add',[
			'uses'=>'CategoryController@add',
			'as'=>'admin.category.add'
		]);

		Route::get('delete/{id}',[
			'uses'=>'CategoryController@del',
			'as'=>'admin.category.del'
		]);
	});
});


