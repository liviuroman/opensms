@extends('master', ['page_title' => 'SMSuri trimise - OpenSMS'])

@section('content')

  @include('admin.topmenu')
  <div>
    <h3>SMSuri trimise</h3>

    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>UID</th>
          <th>Telefon</th>
          <th>Mesaj</th>
          <th>Data</th>
        </tr>
      </thead>
      <tbody>
      @foreach($mesaje as $sms)
        <tr>
          <td>{{ $sms->id }}</td>
          <td>{{ $sms->uid }}</td>
          <td>{{ $sms->telefon }}</td>
          <td>{{ $sms->mesaj }}</td>
          <td>{{ $sms->sent_at }}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
{{ $mesaje->links() }}
  </div>
@endsection