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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/home', function()
{
    return View::make('home');
});

Route::get('/resume', function()
{
    return View::make('resume');
});

Route::get('/portfolio', function()
{
    return View::make('portfolio');
});

Route::get('/sayhello/{name}', function($name)
{
    return View::make('my-first-view')->with('name', $name);
});

Route::get('/rolldice/{guess}', function($guess)
{	
	$roll = mt_rand(1, 6);
	$message =$roll == $guess ? "Way to go!" : "Wrong Guess";
	$data = array(
		'guess' => $guess,
		'roll' => $roll,
		'message' => $message

		);
		return View::make('roll-dice')->with($data);
	
});

