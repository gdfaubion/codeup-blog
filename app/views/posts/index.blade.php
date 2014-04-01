@extends('layouts.master')

@section('content')
    <div class="container">

        <div class="blog-header">
            <h1 class="blog-title">The Blog</h1>
            <p class="lead blog-description">Stuff and Words and Things</p>
        </div>

        <div class="row">

            <div class="col-sm-8 blog-main">
                @foreach ($posts as $post)
                    <div class="blog-post">
                        <h2 class="blog-post-title">{{{ $post->title }}}</h2>
                        <p class="blog-post-meta">{{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS @ h:i:s A') }}} {{{ $post->user->email }}}</p>
                        <blockquote>
                        <p>{{{ Str::words($post->body, 10)}}}</p>
                        </blockquote>
                        <p><a href="{{{action('PostsController@show', $post->id)}}}">View Post</a>
                    </div><!-- /.blog-post -->
                @endforeach
                    <div>
                        {{$posts->links()}}
                    </div>
            </div><!-- /.blog-main -->

            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                <div class="sidebar-module sidebar-module-inset" id="aboutSidebar">
                    <a href="{{{ action('PostsController@create')}}}"><span class="glyphicon glyphicon-plus"></span>Create New Post</a></p>
                </div>
            </div>
            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                <div class="sidebar-module sidebar-module-inset" id="aboutSidebar">
                    <h4>About</h4>
                    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                </div>
                <div class="sidebar-module">
                    <h4>Connect With Me</h4>
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
