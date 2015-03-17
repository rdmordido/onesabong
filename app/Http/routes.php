<?php

Route::group(['domain' => '{account}.onesabong.app'], function()
{

   //account specific routers

});

Route::group(['domain' => 'onesabong.app'], function()
{

	Route::get('/','HomeController@index');
	Route::get('register','AuthController@showRegistrationForm');
	Route::post('register','AuthController@register');
	Route::get('logout','AuthController@logout');
	Route::group(['middleware' => 'guest'], function()
	{
	    Route::get('login','AuthController@showLoginForm');
	    Route::post('login','AuthController@login');
	});

	Route::group(['middleware' => 'auth'], function()
	{
		Route::get('admin','Admin\DashboardController@index');
		Route::resource('admin/account','Admin\AccountController');
		Route::resource('admin/user','Admin\UserController');
		
		Route::model('account','App\Company');
	    Route::model('user','App\User');

	});

});


