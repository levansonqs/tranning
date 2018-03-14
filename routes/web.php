<?php
// Route::get('/', function () {
// 	 return view('welcome');
// });

// Auth::routes();

Route::group(['namespace'=>'Auth'], function(){
    Route::group(['prefix'=>'auth'], function(){
        //login user
        Route::get('login', [
            'uses'  => 'AuthController@getLogin',
            'as'    => 'auth.login',
        ]);
        Route::post('login', [
            'uses'  => 'AuthController@postLogin',
            'as'    => 'auth.postLogin',
        ]);
        //logout
        Route::get('logout', [
            'uses'  => 'AuthController@logout',
            'as'    => 'auth.logout',
        ]);
        // //register
        Route::get('register', [
            'uses'  => 'RegisterUserController@getRegister',
            'as'    => 'auth.register',
        ]);
        Route::post('register', [
            'uses'  => 'RegisterUserController@postRegister',
            'as'    => 'auth.register',
        ]);
        //login facebook
        Route::get('login/facebook',[
            'uses'  => 'AuthController@redirectToProvider',
            'as'    => 'auth.facebook'
        ]);
        Route::get('facebook/callback', [
            'uses'  =>  'AuthController@handleProviderCallback',
        ]);
    });
});

Route::namespace('Admin')->prefix('admin')->group(function(){
	Route::prefix('index')->group(function() {
		Route::get('index' , [
			'uses' => 'IndexController@index',
			'as'   => 'admin.index.index'
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


	Route::prefix('product')->group(function(){
		Route::get('index',[
			'uses'=>'ProductController@index',
			'as'=>'admin.product.index'
		]);

		Route::get('add',[
			'uses'=>'ProductController@getAdd',
			'as'=>'admin.product.add'
		]);
		Route::post('add',[
			'uses'=>'ProductController@postAdd',
			'as'=>'admin.product.add'
		]);

		Route::get('edit/{id}',[
			'uses'=>'ProductController@getEdit',
			'as'=>'admin.product.edit'	
		]);
		Route::post('edit/{id}',[
			'uses'=>'ProductController@postEdit',
			'as'=>'admin.product.edit'
		]);

		Route::get('delete/{id}',[
			'uses'=>'ProductController@delete',
			'as'=>'admin.product.delete'
		]);
	});



});
Route::group(['namespace'=>'Shop'], function(){
	Route::get('index', [
		'uses'  => 'IndexController@index',
		'as'    => 'shop.index.index'
	]);
});






