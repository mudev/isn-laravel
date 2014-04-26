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

//Authentication of the Login
Route::post('login', function(){
	$user = array(
		'username' => Input::get('email'),
		'password' => Input::get('password')
	);
	if (Auth::attempt($user))
	{
		return Redirect::to('profile');
	}
	return Redirect::to('login')->with('login_error','Could not log in');
});

Route::get('profile', function(){
	if (Auth::check())
	{
		return View::make('profile')->with('user', Auth::user());
	}
	else {
		return Redirect::to('login')->with('login_error',
			'You must log in first.');
	}
});

Route::get('profile-edit', function(){
	if (Auth::check()){
		$user = Input::old() ? (object) Input::old() : Auth::user();
	}
});

//Process registration process
Route::post('registration', array('before' => 'csrf',
	function()
	{
		$rules = array(
			'email' => 'required|email|unique:users',
			'password' => 'required|same:password_confirm',
			'name' => 'required'
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails())
		{
			return Redirect::to('registration')->withErrors
			($validation)->withInput();
		}

		$user = new User;
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->name = Input::get('name');
		$user->admin = Input::get('admin') ? 1 : 0;
		if ($user->save())
		{
			Auth::loginUsingId($user->id);
			return Redirect::to('profile');
		}
		return Redirect::to('registration')->withInput();
	}
));

Route::post('profile-edit', function() {
	$rules = array(
		'email' => 'required|email',
		'password' => 'same:password_confirm',
		'name' => 'required'
	);
	$validation = Validator::make(Input::all(), $rules);
	if ($validation->fails()) {
		return Redirect::to('profile-edit')->withErrors
		($validation)->withInput();
	}
	$user = User::find(Auth::user()->id);
	$user->email = Input::get('email');
	if (Input::get('password')) {
		$user->password = Hash::make(Input::get('password'));
	}
	$user->name = Input::get('name');
	if ($user->save()) {
		return Redirect::to('profile')->with('notify',
			'Information Updated');
	}
	return Redirect::to('profile-edit')->withInput();
});

// Route to the secured area
Route::get('secured', array('before' => 'auth', function()
{
	return 'this is a secured page';
}));