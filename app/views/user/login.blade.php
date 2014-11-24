@extends('master', ['page_title' => 'Autentificare - OpenSMS'])

	@section('content')

		<div>
			<h3>Autentificare</h3>

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

			{{ Form::open(array('url' => 'user/login', 'class' => 'form-horizontal', 'role' => 'form')) }}
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email:</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" name="email" value="{{ Input::old('email') }}" placeholder="Adresa ta de email" required>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-2 control-label">Parola:</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="password" name="password" placeholder="Parola contului" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-2">
						<button type="submit" class="btn btn-success">Autentificare</button>
					</div>
					<div class="col-ms-offset-2 col-sm-8">
						<a href="{{ URL::to('password/remind') }}" class="btn btn-default">Am uitat parola</a>
						<a href="{{ URL::to('user/reconfirm') }}" class="btn btn-default">Retrimite email de confirmare</a>
					</div>
				</div>
			{{ Form::close() }}
		</div>

	@endsection