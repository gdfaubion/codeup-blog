@extends('layouts.master')

@section('content')
	<div class="blog-post">
        <h2 class="blog-post-title">{{{$posts->title}}}</h2>
        <p>{{{$posts->created_at}}}</p>
        <p>{{{$posts->body}}}</p>
        <p><a href="{{{ action('PostsController@index') }}}">View All Posts</a></p>
    </div>
@stop