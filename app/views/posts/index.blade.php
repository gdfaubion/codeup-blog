@extends('layouts.master')

@section('content')
	@foreach ($posts as $post)
	<div class="blog-post" style="text-align:center">
        <h2 class="blog-post-title">{{{$post->title}}}</h2>
         <p class="blog-post-meta">{{{$post->created_at}}}</p>

        <p><a href="{{{action('PostsController@show', $post->id)}}}">View Post</a></p>
    </div>
    @endforeach
@stop
