<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')&mdash; Cock.li E-mail Hosting</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
  <div class="container">
    <img src="/img/cock.svg" class="logo" />
    <h1 class="title hidden-xs">Cock.li &mdash; Yeah it's mail with cocks</h1>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <div class="navbar-brand visible-xs">Cock.li &mdash; Yeah it's mail with cocks</div>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/server') }}">Server Info</a></li>
            <li><a href="{{ url('/mailinglist') }}">Mailing List</a></li>
            <li><a href="{{ url('/donate') }}">Donate</a></li>
            <li><a href="{{ url('https://mail.cock.li/') }}">Webmail</a></li>
            <li><a href="{{ url('/xmpp') }}">XMPP</a></li>
            <li><a href="{{ url('https://twitter.com/gexcolo') }}">Twitter</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
              <li><a href="{{ url('/auth/login') }}">Login</a></li>
              <li><a href="{{ url('/auth/register') }}">Register</a></li>
            @else
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->email }} <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="{{ url('/user/changepass') }}">Change Password</a></li>
                  <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                </ul>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>

    <div class="panel panel-default">
      <div class="panel-heading">
        @yield('title')
      </div>
      <div class="panel-body">
        @yield('content')
      </div>
      <div class="panel-footer clearfix">
        <div class="pull-left">
          Service provided for fun by <strong><a href="https://vc.gg/">Vincent Canfield</a></strong>
        </div>
        <div class="pull-right">
          <strong><a href="/abuse">Report Abuse</a></strong> |
          <strong><a href="/tos">Terms of Service</a></strong> |
          <strong><a href="/privacy">Privacy Policy</a></strong>
        </div>
      </div>
    </div>

  </div>
  <script src='/js/jquery.js'></script>
  <script src='/js/bootstrap.js'></script>
</body>
</html>
