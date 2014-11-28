@extends('master', ['page_title' => 'OpenSMS - SMS gratis în orice rețea din România'])

@section('content')
	<div class="jumbotron">
		<h1 class="hidden-xs">OpenSMS <span class="badge">beta</span></h1>
		<p class="lead">Cu OpenSMS poți trimite SMS-uri gratuit către orice telefon mobil din România. De asemenea, poți integra <b>OpenSMS</b> în orice aplicație pentru a trimite alerte SMS în timp real.</p>
		
		@if(!Auth::check())
			<p><a class="btn btn-lg btn-success" href="{{ URL::to('user/create') }}" role="button">Înregistrare &raquo;</a></p>
		@endif
	</div>

	<div class="row marketing">
		<div class="col-lg-6">
			<div class="mini-box">
				<h4>Gratuit</h4>
				<p>Trimiți <b>SMS gratis</b> către orice telefon mobil din România, indiferent de rețeaua mobilă.</p>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mini-box">
				<h4>Pentru dezvoltatori</h4>
				<p>Integrează OpenSMS în aplicația ta prin intermediul unui API simplu și prietenos.</p>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mini-box">
				<h4>Non-Stop</h4>
				<p>Te poți autentifica oricând în contul tău OpenSMS și să trimiți un mesaj oricui dorești tu.</p>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mini-box">
				<h4>Feedback</h4>
				<p>Comunicăm în permanență cu utilizatorii noștri pentru a aduce îmbunătățiri serviciului.</p>
			</div>
		</div>
	</div>
@endsection