<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		return View::make('home.index');
	}
	

	public function getLogin()
	{
		return View::make('home.login');
	}

	public function postLogin()
	{
		$input = Input::all();

		$rules = array('email' => 'required', 'password' => 'required');

		$v = Validator::make($input, $rules);

		if($v->fails())
		{

			return Redirect::to('login')->withErrors($v);

		} else { 

			$credentials = array('email' => $input['email'], 'password' => $input['password']);

			if(Auth::attempt($credentials))
			{

				return Redirect::to('admin');

			} else {

				return Redirect::to('login');
			}
		}
	}

	public function getRegister()
	{
		return View::make('home.register');
	}

	public function postRegister()
	{
		$input = Input::all();

		$rules = array('username' => 'required|unique:users', 'email' => 'required|unique:users|email', 'password' => 'required');

		$v = Validator::make($input, $rules);

		if($v->passes())
		{
			$password = $input['password'];
			$password = Hash::make($password);

			$user = new User();
			$user->username = $input['username'];
			$user->email = $input['email'];
			$user->password = $password;
			$user->save();

			return Redirect::to('login');

		} else {

			return Redirect::to('register')->withInput()->withErrors($v);

		}
	}


	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}
	

}