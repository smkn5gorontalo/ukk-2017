<?php
Auth::routes();
Route::get('/', function(){
	return redirect('home');
});
Route::group(['middleware'=>'auth'], function(){
	Route::get('/home', 'HomeController@index');
	Route::group(['prefix'=>'admin'], function(){
		Route::get('/', function(){
			return redirect('admin/home');
		});
		Route::get('home', function(){
			return view('home');
		});
		Route::group(['middleware'=>'hakakses:admin'], function(){
			Route::resource('distributor', 'Admin\\DistributorController');
			Route::resource('pasok', 'Admin\\PasokController');
			Route::resource('buku', 'Admin\\BukuController');
			Route::resource('user', 'UserController');
		});
		Route::resource('penjualan', 'Admin\\PenjualanController');
	});
});

