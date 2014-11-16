@extends('master')

	@section('content')

		<div>
			<h3>Creaza un cont</h3>

			@if(Session::has('success'))
	      <div class="alert alert-success alert-dismissible" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        {{ Session::get('success') }}
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

			{{ Form::open(array('url' => 'user/create', 'class' => 'form-horizontal', 'role' => 'form')) }}
				<div class="form-group">
					<label for="name" class="col-sm-2 control-label">Nume:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="name" name="name" value="{{ Input::old('name') }}" placeholder="Introdu numele tau" required>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email:</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" name="email" value="{{ Input::old('email') }}" placeholder="Adresa ta de email" required>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-2 control-label">Parola:</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="password" name="password" placeholder="Alege o parola pentru contul tau" required>
					</div>
				</div>
				<div class="form-group">
					<label for="password_confirmation" class="col-sm-2 control-label">Repeta parola:</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Repeta parola scrisa mai sus" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success">Inregistrare</button>
					</div>
				</div>
			{{ Form::close() }}
		</div>

	@endsection