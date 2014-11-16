@extends('master')

@section('content')

  @include('admin.topmenu')
  <div>
    <h3>Blocheaza numere de telefon</h3>

    @if ($errors->has())
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        @foreach ($errors->all() as $error)
          {{ $error }}<br>
        @endforeach
      </div>
    @endif
    
    {{ Form::open(array('route' => 'admin.numereblocate.store', 'class' => 'form-horizontal', 'role' => 'form')) }}
      <div class="form-group">
        <label for="telefon" class="col-sm-2 control-label">Telefon:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="telefon" name="telefon" value="{{ Input::old('telefon') }}" placeholder="Numarul de telefon pe care vrei sa il blochezi" required>
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success">Salveaza</button>
        </div>
      </div>
    {{ Form::close() }}

    <table class="table table-hover">
      <thead>
        <tr>
          <th width="3%">ID</th>
          <th>Telefon</th>
          <th width="5%">Data</th>
          <th width="10%">Info</th>
        </tr>
      </thead>
      <tbody>
      @foreach($block as $item)
        <tr>
          <td>{{{ $item->id }}}</a></td>
          <td>{{ $item->telefon }}</a></td>
          <td>{{ $item->created_at }}</td>
          <td>
            <a href="{{ URL::to('admin/numereblocate') }}/{{ $item->id }}/edit" title="Edit"><span class="glyphicon glyphicon-edit" style="margin-right:10px"></span></a>
            {{ Form::open(array('url' => 'admin/numereblocate/' . $item->id, 'class' => 'pull-right')) }}
              {{ Form::hidden('_method', 'DELETE') }}
              <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button>
            {{ Form::close() }}
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
{{ $block->links() }}
  </div>
@endsection