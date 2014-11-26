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
			<div class="header">
				<ul class="nav nav-pills pull-right" role="tablist">
					<li role="presentation"><a href="{{ URL::to('despre') }}">Despre</a></li>
					<li role="presentation"><a href="{{ URL::to('intrebari-frecvente') }}">Întrebări frecvente</a></li>
					<li role="presentation"><a href="{{ URL::to('news') }}">Noutăți</a></li>
					@if(Auth::check())
						<li role="presentation" class="active dropdown">
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
						<li role="presentation" class="active"><a href="{{ URL::to('user/login') }}">Autentificare</a></li>
					@endif
				</ul>
				<h3 class="text-muted"><a href="{{ URL::to('/') }}">OpenSMS</a> <span class="badge">beta</span></h3>
			</div>

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