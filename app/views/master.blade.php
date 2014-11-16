<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OpenSMS - SMS gratis in orice retea din Romania</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/jumbotron-narrow.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right" role="tablist">
          <li role="presentation"><a href="{{ URL::to('despre') }}">Despre</a></li>
          <li role="presentation"><a href="{{ URL::to('intrebari-frecvente') }}">Intrebari frecvente</a></li>
          <li role="presentation"><a href="{{ URL::to('news') }}">Noutati</a></li>
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
                <li><a href="{{ URL::to('user/logout') }}">Iesire <span class="glyphicon glyphicon-remove-sign"></span></a></li>
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
        <p class="pull-right">Hosted on <a href="http://www.vultr.com/?ref=6809771" target="_blank" rel="nofollow">VULTR</a></p>
      </div>

    </div> <!-- /container -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  </body>
</html>