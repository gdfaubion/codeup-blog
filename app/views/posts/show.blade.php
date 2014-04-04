@extends('layouts.master')

@section('content')
    <div class="container">

        <div class="blog-header">
            <h1 class="blog-title">The Blog</h1>
                <p class="lead blog-description">Stuff and Words and Things</p>
        </div>

    <div class="row">

        <div class="col-sm-8 blog-main">
            <div class="blog-post">
                <h2 class="blog-post-title">{{{$post->title}}}</h2>

                @if (Auth::user()->canManagePost($post))
                    <p><a href="{{{ action('PostsController@edit', $post->id) }}}">Edit Post</a> | <a href="#" id="btnDeletePost">Delete Post</a> | <a href="{{{ action('PostsController@index') }}}">View All Posts</a></p>
                @else
                    <p><a href="{{{ action('PostsController@index') }}}">View All Posts</a></p>
                @endif 

                <p class="blog-post-meta">
                    {{{$post->created_at->format('l, F jS @ h:i:s A')}}} {{{ $post->user->first_name }}}
                </p>
                <blockquote>
                <p>
                    <img src="{{{ $post->image }}}">
                </p>
                <p>
                    {{{$post->body}}}
                </p>
                </blockquote>
            </div><!-- /.blog-post -->
            
            <!-- disqus comments section -->
            <div id="disqus_thread"></div>
                <script type="text/javascript">
                    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                    var disqus_shortname = 'gracefaubionsblog'; // required: replace example with your forum shortname

                    /* * * DON'T EDIT BELOW THIS LINE * * */
                    (function() {
                        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
                <!-- disqus comment section -->

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

    {{ Form::open(array('action' => array('PostsController@destroy', $post->id), 'method' => 'delete', 'id' => 'formDeletePost')) }}
    {{ Form::close() }}
@stop

@section('bottom-script')

    <script type="text/javascript">

        $('#btnDeletePost').on('click', function (e) {
        e.preventDefault();
        if(confirm("Are you sure you want to delete this post?")) {
        $('#formDeletePost').submit();
        }
        });

    </script>

@stop