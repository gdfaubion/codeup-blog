@extends('layouts.master')

@section('content')
	@foreach ($posts as $post)
	<div class="blog-post" style="text-align:center">
        <h2 class="blog-post-title">{{{$post->title}}}</h2>
        <p>{{{ Str::words($post->body, 10)}}}</p>
         <p class="blog-post-meta">{{{$post->created_at->setTimezone('America/Chicago')->format('l, F jS @ h:i:s A')}}}</p>

        <p><a href="{{{action('PostsController@show', $post->id)}}}">View Post</a></p>
    </div>
    @endforeach
    <div style="text-align:center">
    {{$posts->links()}}
    </div>
	</div>

@stop
