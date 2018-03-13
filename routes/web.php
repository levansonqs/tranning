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

		Route::get('add',[
			'uses'=>'CategoryController@getAdd',
			'as'=>'admin.category.add'
		]);
		Route::post('add',[
			'uses'=>'CategoryController@postAdd',
			'as'=>'admin.category.add'
		]);

		Route::get('edit/{id}',[
			'uses'=>'CategoryController@getEdit',
			'as'=>'admin.category.edit'	
		]);
		Route::post('edit/{id}',[
			'uses'=>'CategoryController@postEdit',
			'as'=>'admin.category.edit'
		]);

		Route::get('delete/{id}',[
			'uses'=>'CategoryController@del',
			'as'=>'admin.category.del'
		]);
	});
});
Route::group(['namespace'=>'Shop'], function(){
    Route::get('index', [
        'uses'  => 'IndexController@index',
        'as'    => 'shop.index.index'
    ]);
});


