
<?php
Auth::routes();
Route::pattern('id', '[0-9]+');
Route::pattern('name','.*');
Route::pattern('rowid','.*');

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
        //login google
		Route::get('login/google', [
			'uses'  => 'AuthController@googleRedirectToProvider',
			'as'    => 'auth.google'
		]);
		Route::get('google/callback', [
			'uses'  => 'AuthController@googleHandleProviderCallback',
		]);

         //login twitter
		Route::get('login/twitter', [
			'uses'  => 'AuthController@twitterRedirectToProvider',
			'as'    => 'auth.twitter'
		]);
		Route::get('twitter/callback', [
			'uses'  => 'AuthController@twitterHandleProviderCallback',
		]);

		// reset password
        Route::post('password/email',[
            'uses'  =>  'ForgotPasswordController@sendResetLinkEmail',
            'as'    =>  'password.email'
        ]); 
		Route::get('password/reset', [
			'uses'  =>  'ForgotPasswordController@showLinkRequestForm',
			'as'    =>  'password.request'
		]);
		Route::post('password/reset',[
			'uses'  =>  'ResetPasswordController@reset',
		]);
		Route::get('password/reset/{token}',[
			'uses'  =>  'ResetPasswordController@showResetForm',
			'as'    =>  'password.reset'
		]);
	});
});

Route::namespace('Admin')->prefix('admin')->middleware('auth')->group(function(){
	Route::prefix('index')->group(function() {
		Route::get('index' , [
			'uses' => 'IndexController@index',
			'as'   => 'admin.index.index'
		]);
	});

	Route::prefix('category')->middleware('manager')->group(function(){
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

	Route::prefix('product')->middleware('manager')->group(function(){
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

	Route::prefix('order')->middleware('manager')->group(function(){
		Route::get('index',[
			'uses'=>'OrderController@index',
			'as'=>'admin.order.index'
		]);

		Route::get('add',[
			'uses'=>'OrderController@getAdd',
			'as'=>'admin.order.add'
		]);
		Route::post('add',[
			'uses'=>'OrderController@postAdd',
			'as'=>'admin.order.add'
		]);

		Route::get('edit/{id}',[
			'uses'=>'OrderController@getEdit',
			'as'=>'admin.order.edit'	
		]);
		Route::post('edit/{id}',[
			'uses'=>'OrderController@postEdit',
			'as'=>'admin.order.edit'
		]);

		Route::get('delete/{id}',[
			'uses'=>'OrderController@delete',
			'as'=>'admin.order.delete'
		]);

		//in hoa don
		Route::get('print/{id}',[
			'uses'=>'OrderController@printReceipt',
			'as'=>'admin.order.print'
		]);
	});

	Route::post('orderdetail/{id}',['uses' => 'OrderController@getOrderDetail']);

	Route::prefix('orderdetail')->middleware('manager')->group(function(){
		Route::get('index',[
			'uses'=>'OrderDetailController@index',
			'as'=>'admin.orderdetail.index'
		]);

		Route::get('add',[
			'uses'=>'OrderDetailController@getAdd',
			'as'=>'admin.orderdetail.add'
		]);
		Route::post('add',[
			'uses'=>'OrderDetailController@postAdd',
			'as'=>'admin.orderdetail.add'
		]);

		Route::get('edit/{id}',[
			'uses'=>'OrderDetailController@getEdit',
			'as'=>'admin.orderdetail.edit'	
		]);
		Route::post('edit/{id}',[
			'uses'=>'OrderDetailController@postEdit',
			'as'=>'admin.orderdetail.edit'
		]);

		Route::get('delete/{id}',[
			'uses'=>'OrderDetailController@delete',
			'as'=>'admin.orderdetail.delete'
		]);
	});


	Route::prefix('user')->middleware('admin')->group(function(){
		Route::get('index',[
			'uses'=>'UserController@index',
			'as'=>'admin.user.index'
		]);

		Route::get('add',[
			'uses'=>'UserController@getAdd',
			'as'=>'admin.user.add'
		]);
		Route::post('add',[
			'uses'=>'UserController@postAdd',
			'as'=>'admin.user.add'
		]);

		Route::get('edit/{id}',[
			'uses'=>'UserController@getEdit',
			'as'=>'admin.user.edit'	
		]);
		Route::post('edit/{id}',[
			'uses'=>'UserController@postEdit',
			'as'=>'admin.user.edit'
		]);

		Route::get('delete/{id}',[
			'uses'=>'UserController@getDelete',
			'as'=>'admin.user.delete'
		]);
	});
	


	Route::post('productdetail/{id}',[
		'uses'=>'ProductController@getDetail',
		'as'=>'admin.productdetail'
	]);
});
Route::group(['namespace'=>'Shop'], function(){
	Route::get('', [
		'uses'  => 'IndexController@index',
		'as'    => 'shop.index.index'
	]);
	Route::get('cart', [
		'uses'  => 'CartController@indexCart',
		'as'    => 'shop.news.indexCart'
	]);
	Route::get('cart/{name}/{id}', [
		'uses'  => 'CartController@buy',
		'as'    => 'shop.cart.buy'
	]);
	Route::get('order', [
		'uses'  => 'OrderController@indexOrder',
		'as'    => 'shop.order.indexOrder'
	]);
	Route::get('{name}-{id}.html', [
		'uses'  => 'ProductController@indexProduct',
		'as'    => 'shop.product.indexProduct'
	]);


	Route::get('contact',[
		'uses'=>'ContactController@getContact',
		'as'=>'shop.contact'
	]);
	Route::post('contact',[
		'uses'=>'ContactController@contact',
		'as'=>'shop.contact'
	]);

	//Order
	Route::get('mua-hang/{id}/{tensanpham}',[
		'as'=>'muahang',
		'uses'=>'IndexController@muahang'
	]);
	Route::get('gio-hang',['as'=>'giohang','uses'=>'IndexController@giohang']);

	// Route::get('xoa-san-pham/{rowid}',['as'=>'xoasanpham','uses'=>'IndexController@xoasanpham']);
	// Route::post('cap-nhat/{rowid}/{qty}',['as'=>'capnhat','uses'=>'OrderController@capnhat']);
	// 
	Route::get('/xoa-san-pham',['as'=>'xoasanpham','uses'=>'IndexController@xoasanpham']);

	Route::get('dat-hang',['as'=>'dathang','uses'=>'IndexController@getDathang']);
	Route::post('dat-hang',['as'=>'dathang','uses'=>'IndexController@postDathang']);
	// Route::get('thanh-toan',['as'=>'thanhtoan','uses'=>'IndexController@postDathang']);

	Route::get('cate/{name}-{id}', [
		'uses'  => 'CateController@indexCate',
		'as'    => 'shop.cate.indexCate'
	]);

});


Route::get('noaccess',function(){
	// echo "Bạn không có quyền truy cập !";
	return view('admin.access.noaccess');
});


// Route::get('/home', 'HomeController@index')->name('home');
