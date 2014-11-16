@extends('master')

	@section('content')

		<div class="jumbotron" style="text-align:left">
			<h1>OpenSMS <span class="badge">beta</span></h1>
			<p class="lead">Cu OpenSMS poti trimite SMS-uri gratuit catre orice telefon mobil din Romania. De asemenea, poti integra <b>OpenSMS</b> in orice aplicatie pentru a trimite alerte SMS in real-time.</p>
			<p><a class="btn btn-lg btn-success" href="{{ URL::to('user/create') }}" role="button">Inregistrare &raquo;</a></p>
		</div>

		<div class="row marketing">
			<div class="col-lg-6">
				<h4>Gratuit</h4>
				<p>Trimiti <b>SMS gratis</b> catre orice telefon mobil din Romania, indiferent de reteaua mobila.</p>

				<h4>Non-Stop</h4>
				<p>Te poti loga oricand in contul tau OpenSMS si sa trimiti un mesaj oricui doresti tu.</p>
			</div>

			<div class="col-lg-6">
				<h4>Pentru developeri</h4>
				<p>Integreaza OpenSMS in aplicatia ta prin intermediul unui API simplu si prietenos.</p>

				<h4>Feedback</h4>
				<p>Comunicam in permanenta cu utilizatorii nostri pentru a aduce imbunatatiri serviciului.</p>
			</div>
		</div>

	@endsection