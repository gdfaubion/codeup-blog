<?php

class PostsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::all();

    	return View::make('posts.index')->with('posts', $posts);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//This will show a form for creating a post.
		return View::make('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//This will creat and save a new post
		//Logging info
		Log::info(Input::all());
		// create the validator
		$validator = Validator::make(Input::all(), Post::$rules);
		// attempt validation
		if($validator->fails()) {
			// validation fail so redirect back with input and errors
			return Redirect::back()->withInput()->withErrors($validator);

		} else {
			//validate succeeded create and save the post
			$post = new Post();

			$post->title = Input::get('title');

			$post->body = Input::get('body');

			$post->save();

			return Redirect::action('PostsController@index');
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$posts = Post::findOrFail($id);

    	return View::make('posts.show')->with('posts', $posts);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//return View::make('')->with('id', $id);
		//return "This will show a form for editing a specific post.";
		$post = Post::findOrFail($id);
		return View::make('posts.edit')->with('post', $post);

		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//return View::make('')->with('id', $id)
		//find post id
		$post = Post::findOrFail($id);
		// create the validator
		$validator = Validator::make(Input::all(), Post::$rules);
		// attempt validation
		if($validator->fails()) {
			// validation fail so redirect back with input and errors
			return Redirect::back()->withInput()->withErrors($validator);

		} else {
			//validate succeeded create and save the post
			$post->title = Input::get('title');

			$post->body = Input::get('body');

			$post->save();

			return Redirect::action('PostsController@index');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//return View::make('')->with('id', $id);
		return "This will delete a specific post.";
	}

}