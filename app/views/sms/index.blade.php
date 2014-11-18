@extends('master', ['page_title' => 'Trimite SMS gratis - OpenSMS'])

@section('content')
<div>

<h3>Trimite SMS</h3>

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

{{ Form::open(array('url' => 'sms/send', 'class' => 'form-horizontal', 'role' => 'form')) }}
  <div class="form-group">
    <label for="telefon" class="col-sm-2 control-label">Telefon:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="telefon" name="telefon" value="{{ Input::old('telefon') }}" placeholder="Introdu numarul de telefon caruia vrei sa ii trimiti SMS (ex: 07XX...)" required>
    </div>
  </div>

  <div class="form-group">
    <label for="mesaj" class="col-sm-2 control-label">Mesaj:</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="3" name="mesaj" placeholder="Textul mesajului (maxim 160 caractere)" maxlength="160" required>{{ Input::old('mesaj') }}</textarea>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success">Trimite</button>
    </div>
  </div>
{{ Form::close() }}

</div>
@endsection