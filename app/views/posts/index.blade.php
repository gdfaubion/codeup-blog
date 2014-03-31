@extends('layouts.master')

@section('content')
<div class="container">

      <div class="blog-header">
        <h1 class="blog-title">The Bootstrap Blog</h1>
        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
      </div>
      <div>
        <a href="{{{ action('PostsController@create')}}}"><span class="glyphicon glyphicon-plus"></span>Create New Post</a></p>
      </div>
      <div class="row">

        <div class="col-sm-8 blog-main">
            @foreach ($posts as $post)
          <div class="blog-post">
            <h2 class="blog-post-title">{{{$post->title}}}</h2>
            <p class="blog-post-meta">{{{$post->created_at->format('l, F jS @ h:i:s A')}}} <a href="#">Chris</a></p>
            <p>{{{ Str::words($post->body, 10)}}}</p>
            <p><a href="{{{action('PostsController@show', $post->id)}}}">View Post</a>
          </div><!-- /.blog-post -->
          @endforeach
          <div>
             {{$posts->links()}}
          </div>
        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset" id="aboutSidebar">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
              <li><a href="#">March 2013</a></li>
              <li><a href="#">February 2013</a></li>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <div class="blog-footer">
      <p>Grace Faubion's Blog! Built at CodeUp! </p>
      <p>
        <a href="http://blog.dev/home">Back to top</a>
      </p>
    </div>
@stop
