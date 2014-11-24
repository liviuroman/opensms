@extends('master', ['page_title' => 'Retrimite email de confirmare - OpenSMS'])

  @section('content')

    <div>
      <h3>Retrimite email de confirmare</h3>

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

      {{ Form::open(array('url' => 'user/reconfirm', 'class' => 'form-horizontal', 'role' => 'form')) }}
        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">Email:</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" value="{{ Input::old('email') }}" placeholder="Adresa ta de email">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Trimite email</button>
          </div>
        </div>
      {{ Form::close() }}
    </div>

  @endsection