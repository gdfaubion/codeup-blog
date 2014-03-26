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
		// return "This will show a form for creating a post.";
		return View::make('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// return "This will show a new post.";

		Log::info(Input::all());

		$post = new Post();

		$post->title = Input::get('title');

		$post->body = Input::get('body');

		$post->save();

		// return Redirect::back()->withInput();
		return Redirect::action('PostsController@index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$posts = Post::find($id);

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
		return "This will show a form for editing a specific post.";
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
		return "This will update a specific post.";
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