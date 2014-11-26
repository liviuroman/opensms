@extends('master', ['page_title' => 'Contul meu - OpenSMS'])

@section('content')

	<div>
		<h3>Contul meu</h3>

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

		{{ Form::open(array('url' => 'user/account', 'class' => 'form-horizontal', 'role' => 'form')) }}
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">Nume:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" name="name" value="{{{ Auth::user()->name }}}" readonly>
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-2 control-label">Email:</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
				</div>
			</div>
			<div class="form-group">
				<label for="password_old" class="col-sm-2 control-label">Parola veche:</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="password_old" name="password_old" placeholder="Parola actuală a contului" required>
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-2 control-label">Parola nouă:</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="password" name="password" placeholder="Alege o nouă parolă" required>
				</div>
			</div>
			<div class="form-group">
				<label for="password_confirmation" class="col-sm-2 control-label">Repeta parola noua:</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Introdu din nou parola nouă">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-success">Schimbă parola</button>
				</div>
			</div>
		{{ Form::close() }}

		<hr>

		{{ Form::open(array('url' => 'user/apireset', 'class' => 'form-horizontal', 'role' => 'form')) }}
		<div class="form-horizontal">
			<div class="form-group">
				<label for="api_code" class="col-sm-2 control-label">API Code:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="api_code" value="{{ Auth::user()->api_code }}" readonly>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-success">Resetare cod</button>
			</div>
		</div>
		{{ Form::close() }}
	
	</div>

@endsection