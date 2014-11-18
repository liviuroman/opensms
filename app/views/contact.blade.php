@extends('master', ['page_title' => 'Contact - OpenSMS'])

@section('content')
<div>

<h3>Contact</h3>

<p>Daca aveti intrebari, sugestii sau nelamuriri ma puteti contacta folosind formularul de mai jos. Incerc sa raspund in cel mai scurt timp posibil la fiecare email in parte.</p>

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

{{ Form::open(array('url' => 'contact', 'class' => 'form-horizontal', 'role' => 'form')) }}
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
    <label for="message" class="col-sm-2 control-label">Mesaj:</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="3" name="message" placeholder="Intrebari / sugestii / nelamuriri" required>{{ Input::old('message') }}</textarea>
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