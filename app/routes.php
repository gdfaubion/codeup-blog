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
Route::resource('posts', 'PostsController');

Route::get('/', 'HomeController@showWelcome');

Route::get('/home', 'HomeController@showHome');

Route::get('/resume', 'HomeController@showResume');

Route::get('/portfolio', 'HomeController@showPortfolio');

Route::get('orm-test', function () {
    // $posts = Post::all();

    // foreach($posts as $post) {
    // 	echo '<h2>' . $post->title . '</h2>' . '<p>' . $post->body . '</p>';
    // }

    // $post = Post::find(1);
    // $post->delete();

 //    $post1 = new Post();
	// $post1->title = "Awesome!";
	// $post1->body = "Look at this post.";
	// $post1->save();
	
});