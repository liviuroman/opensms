@extends('master')

@section('content')

  @include('admin.topmenu')
  <div>
    <h3>Ultimele stiri</h3>

    <table class="table table-hover">
      <thead>
        <tr>
          <th width="3%">ID</th>
          <th>Titlu</th>
          <th width="5%">Data</th>
          <th width="10%">Info</th>
        </tr>
      </thead>
      <tbody>
      @foreach($news as $new)
        <tr>
          <td>{{{ $new->id }}}</a></td>
          <td><a href="{{ URL::to('news') }}/{{ $new->id }}" title="{{ $new->titlu }}" target="_blank">{{ $new->titlu }}</a></td>
          <td>{{ $new->created_at }}</td>
          <td>
            <a href="{{ URL::to('admin/news') }}/{{ $new->id }}/edit" title="Edit"><span class="glyphicon glyphicon-edit" style="margin-right:10px"></span></a>
            {{ Form::open(array('url' => 'admin/news/' . $new->id, 'class' => 'pull-right')) }}
              {{ Form::hidden('_method', 'DELETE') }}
              <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button>
            {{ Form::close() }}
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
{{ $news->links() }}
  </div>
@endsection