@extends('master', ['page_title' => 'Utilizatori - OpenSMS'])

@section('content')

  @include('admin.topmenu')
  <div>
    <h3>Utilizatori inregistrati</h3>

    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nume</th>
          <th>Email</th>
          <th>Activ</th>
          <th>Data</th>
        </tr>
      </thead>
      <tbody>
      @foreach($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->active }}</td>
          <td>{{ $user->created_at }}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
{{ $users->links() }}
  </div>
@endsection