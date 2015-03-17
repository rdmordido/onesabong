<?php
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
	Route::resource('admin/company','Admin\CompanyController');
	Route::resource('admin/user','Admin\UserController');

	/*route models*/
	Route::model('company','App\Company');
    Route::model('user','App\User');
    
});