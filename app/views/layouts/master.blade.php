<!doctype html>
<html lang="en">
    <head>
        <title>Grace's Blog</title>
        <script src="/js/jquery.js"></script>
        <script src="bootbox.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/flatly-bootstrap.css">
        <link rel="stylesheet" href="/css/resume.css">
        <link href="signin.css" rel="stylesheet">
    </head>
    <body>
        <!-- Nav Bar for all pages -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{{ action('PostsController@index') }}}">| Grace Faubion |</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="{{ Request::is('resume') ? 'active' : '' }}"><a href="{{{ action('HomeController@showResume') }}}">Resume</a></li>
                        <li class="{{ Request::is('portfolio') ? 'active' : '' }}"><a class="nav-text" href="{{{ action('HomeController@showPortfolio') }}}">Portfolio</a></li>
                        <li class="{{ Request::is('blog') ? 'active' : '' }}"><a class="nav-text" href="{{{ action('PostsController@index') }}}">Blog</a></li>
                        <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Projects<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Address Book</a></li>
                        <li><a href="#">To-Do List</a></li>
                        <li><a href="#">Blackjack</a></li>
                        <!-- <li class="divider"></li>
                        <li><a href="#"></a></li>
                        <li class="divider"></li>
                        <li><a href="#"></a></li> -->
                    </ul>
                    @if (Auth::check())
                        <li><a class="nav-text" href="{{{ action('HomeController@logout') }}}">Logout ({{{ Auth::user()->first_name }}})</a></li>
                    @else 
                        <li><a class="nav-text" href="{{{ action('HomeController@showLogin') }}}">Login</a></li>
                    @endif
                        </li>
                    </ul>
                    {{ Form::open(array('action' => array('PostsController@index'), 'method' => 'GET', 'class' => 'navbar-form navbar-right')) }}
                    <div class="form-group">
                    {{ Form::text('search', null, array('class' => 'form-control', 'placeholder' => 'Search Blog By Keyword')) }}
                    </div>
                    {{Form::submit('Search', array('class' => 'btn btn-success'))}}
                    </form>
                </div>
        </nav>
        <!-- Success and Error messages when submiting forms -->
        @if (Session::has('successMessage'))
        <div class="alert alert-success" style="text-align:center">{{{ Session::get('successMessage') }}}</div>
        @endif
        @if (Session::has('errorMessage'))
        <div class="alert alert-danger" style="text-align:center">{{{ Session::get('errorMessage') }}}</div>
        @endif
@yield('content')

@yield('bottom-script')

    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'gracefaubionsblog'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function () {
            var s = document.createElement('script'); s.async = true;
            s.type = 'text/javascript';
            s.src = '//' + disqus_shortname + '.disqus.com/count.js';
            (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
        }());
    </script>

    <!-- Fade out error or success messages after forms are submitted -->
    <script type="text/javascript">
        $('.alert-success').fadeOut(3000);
        $('.alert-danger').fadeOut(3000);
    </script>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</html>