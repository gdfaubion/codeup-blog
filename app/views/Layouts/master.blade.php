<!doctype html>
<html lang="en">
<head>
    <title>Grace's Blog</title>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="/css/flatly-bootstrap.css">
	<link rel="stylesheet" href="/css/resume.css">
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
	  <div class="container">
	  	  <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="{{{ action('PostsController@index') }}}">| Grace Faubion |</a>
	    </div>
	      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('resume') ? 'active' : '' }}"><a href="{{{ action('HomeController@showResume') }}}">Resume</a></li>
        <li class="{{ Request::is('portfolio') ? 'active' : '' }}"><a class="nav-text" href="{{{ action('HomeController@showPortfolio') }}}">Portfolio</a></li>
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
        </li>
      </ul>
	  </div>
	</nav>
	@yield('content')
</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
</html>