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

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showResume()
	{
		return View::make('resume');
	}

	public function showPortfolio()
	{
		return View::make('portfolio');
	}

	public function showHome()
	{
		return View::make('home');
	}

	public function showLogin()
	{
		return View::make('login');
	}

	public function doLogin()
	{
		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
		{	
			Session::flash('successMessage', 'Login Successfull');
		    return Redirect::intended('/posts');
		}
		else
		{
			Session::flash('errorMessage', 'Unable to login. Please check your email and password.');
		    return Redirect::back()->withInput();
		}
	}

	public function logout()
	{
		Auth::logout();
		Session::flash('successMessage', 'Logout Successfull');
		return Redirect::action('PostsController@index');
	}

}