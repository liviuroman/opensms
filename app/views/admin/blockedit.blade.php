@extends('master', ['page_title' => 'Editeaza numar de telefon blocat - OpenSMS'])

@section('content')

  @include('admin.topmenu')
  <div>
    <h3>Editeaza numar de telefon blocat</h3>

    @if ($errors->has())
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        @foreach ($errors->all() as $error)
          {{ $error }}<br>
        @endforeach
      </div>
    @endif
    
    {{ Form::open(array('route' => array('admin.numereblocate.update', $block->id), 'method' => 'PUT', 'role' => 'form')) }}
      <div class="form-group">
        <label for="telefon" class="col-sm-2 control-label">Telefon:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="telefon" name="telefon" value="{{ $block->telefon }}" required>
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success">Salveaza</button>
        </div>
      </div>
    {{ Form::close() }}

   
  </div>
@endsection