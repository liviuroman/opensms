@extends('master')

@section('content')

  @include('admin.topmenu')
  <div>
    <h3>Adauga stiri</h3>

    @if ($errors->has())
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        @foreach ($errors->all() as $error)
          {{ $error }}<br>
        @endforeach
      </div>
    @endif
    
    {{ Form::open(array('route' => 'admin.news.store', 'class' => 'form-horizontal', 'role' => 'form')) }}
      <div class="form-group">
        <label for="titlu" class="col-sm-2 control-label">Titlu:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="titlu" name="titlu" value="{{ Input::old('titlu') }}" placeholder="Titlul stirii" required>
        </div>
      </div>

      <div class="form-group">
        <label for="body" class="col-sm-2 control-label">Body:</label>
        <div class="col-sm-10">
          <textarea class="form-control" rows="10" name="body" placeholder="Textul stirii" required>{{ Input::old('body') }}</textarea>
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