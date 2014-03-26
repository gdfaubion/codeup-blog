@extends('layouts.master')

@section('content')
	<div class="blog-post">
        <h2 class="blog-post-title">{{{$posts->title}}}</h2>
        <p>{{{$posts->created_at}}}</p>
        <p>{{{$posts->body}}}</p>
    </div>
@stop