<!DOCTYPE html>
<html lang="ro">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>{{{ $page_title }}}</title>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/jumbotron-narrow.css" rel="stylesheet">
</head>

<body>
	<div class="container">
		<nav class="navbar header" role="navigation">
			<div class="navbar-header navbar-default">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<h3 class="text-muted"><a href="{{ URL::to('/') }}">OpenSMS</a> <span class="badge">beta</span></h3>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav nav-pills" role="tablist">
					<li><a href="{{ URL::to('despre') }}">Despre</a></li>
					<li><a href="{{ URL::to('intrebari-frecvente') }}">Întrebări frecvente</a></li>
					<li><a href="{{ URL::to('news') }}">Noutăți</a></li>

					<li class="visible-xs"><a href="{{ URL::to('sms') }}"><span class="glyphicon glyphicon-envelope"></span> Trimite SMS</a></li>
					<li class="visible-xs"><a href="{{ URL::to('sms/sent') }}"><span class="glyphicon glyphicon-send"></span> Mesaje trimise</a></li>
					<li class="visible-xs"><a href="{{ URL::to('user/account') }}"><span class="glyphicon glyphicon-user"></span> Contul meu</a></li>
					<li class="visible-xs"><a href="{{ URL::to('user/logout') }}"><span class="glyphicon glyphicon-remove-sign"></span> Ieșire ({{{ Auth::user()->name }}})</a></li>
					@if(Auth::check())
					<li role="presentation" class="active dropdown hidden-xs">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							Salut, {{{ Auth::user()->name }}} <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ URL::to('sms') }}">Trimite SMS <span class="glyphicon glyphicon-envelope"></span></a></li>
							<li><a href="{{ URL::to('sms/sent') }}">Mesaje trimise <span class="glyphicon glyphicon-send"></span></a></li>
							<li><a href="{{ URL::to('user/account') }}">Contul meu <span class="glyphicon glyphicon-user"></span></a></li>
							<li role="presentation" class="divider"></li>
							<li><a href="{{ URL::to('user/logout') }}">Ieșire <span class="glyphicon glyphicon-remove-sign"></span></a></li>
						</ul>
					</li>
					@else
					<li class="active"><a href="{{ URL::to('user/login') }}">Autentificare</a></li>
					@endif
				</ul>
			</div>
		</nav>

		@yield('content')

		<div class="footer">
			<p class="pull-left">&copy; <a href="{{ URL::to('/') }}">OpenSMS</a> 2014 | <a href="{{ URL::to('contact') }}">Contact</a></p>
			<p class="pull-right"><a href="{{ URL::to('api') }}">API</a> | Hosted on <a href="http://www.vultr.com/?ref=6809771" target="_blank" rel="nofollow">VULTR</a></p>
		</div>

	</div> <!-- /container -->

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-274543-38', 'auto');
		ga('send', 'pageview');

	</script>
</body>
</html>