@extends('master', ['page_title' => 'Resetare parola - OpenSMS'])

	@section('content')

		<div>
			<h3>Resetare parola</h3>

			@if(Session::has('success'))
	      <div class="alert alert-success alert-dismissible" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        {{ Session::get('success') }}
	      </div>
	    @endif

	    @if(Session::has('danger'))
	      <div class="alert alert-danger alert-dismissible" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        {{ Session::get('danger') }}
	      </div>
	    @endif

	    @if ($errors->has())
	      <div class="alert alert-danger alert-dismissible" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        @foreach ($errors->all() as $error)
	          {{ $error }}<br>
	        @endforeach
	      </div>
	    @endif

			<form action="{{ action('RemindersController@postReset') }}" method="POST" class="form-horizontal" role="form">
				<input type="hidden" name="token" value="{{ $token }}">
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email:</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" name="email" value="{{ Input::old('email') }}" placeholder="Adresa ta de email">
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-2 control-label">Parola noua:</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="password" name="password" placeholder="Alege o noua parola">
					</div>
				</div>
				<div class="form-group">
					<label for="password_confirmation" class="col-sm-2 control-label">Repeta noua parola:</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Introdu din nou parola noua">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success">Salveaza parola</button>
					</div>
				</div>		
			</form>

		</div>

	@endsection


