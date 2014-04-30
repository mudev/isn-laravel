<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('before' => ['styles','scripts'], function()
{
	$view =  View::make('index');
	$view->nest('header', 'common.header') ->nest('footer','common.footer');
	$view->nest('login', 'login');
	$view->nest('registration', 'registration');
	return $view;
}));

Route::get('admin/logout',  array('as' => 'admin.logout',      'uses' => 'App\Controllers\Admin\AuthController@getLogout'));
Route::get('admin/login',   array('as' => 'admin.login',       'uses' => 'App\Controllers\Admin\AuthController@getLogin'));
Route::post('admin/login',  array('as' => 'admin.login.post',  'uses' => 'App\Controllers\Admin\AuthController@postLogin'));

Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
{
	Route::any('/',                'App\Controllers\Admin\PagesController@index');
	Route::resource('articles',    'App\Controllers\Admin\JobsController');
	Route::resource('pages',       'App\Controllers\Admin\PagesController');
});