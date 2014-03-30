<?php

class PostsController extends \BaseController {
	
	//require authentication for creating or modifying posts
	public function __construct()
	{
	    // call base controller constructor
	    parent::__construct();

	    // run auth filter before all methods on this controller except index and show
	    $this->beforeFilter('auth.basic', array('except' => array('index', 'show')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::orderBy('Created_at', 'desc')->paginate(5);

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
		return View::make('posts.create-edit');
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
			Session::flash('errorMessage', 'Post could not be created successfully - see form errors');

			return Redirect::back()->withInput()->withErrors($validator);

		} else {
			//validate succeeded create and save the post
			$post = new Post();

			$post->title = Input::get('title');

			$post->body = Input::get('body');

			$post->save();

			Session::flash('successMessage', 'Post created successfully');

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
		$post = Post::findOrFail($id);

    	return View::make('posts.show')->with('post', $post);
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
		return View::make('posts.create-edit')->with('post', $post);

		
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
			Session::flash('errorMessage', 'Post could not be updated successfully - see form errors');
			return Redirect::back()->withInput()->withErrors($validator);

		} else {
			//validate succeeded create and save the post
			$post->title = Input::get('title');

			$post->body = Input::get('body');

			$post->save();
			
			Session::flash('successMessage', 'Post updated successfully');

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
		//This will delete a specific post.
		Post::find($id)->delete();
		Session::flash('successMessage', 'Post deleted successfully');
		return Redirect::action('PostsController@index');

	}

}