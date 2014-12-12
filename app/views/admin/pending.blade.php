@extends('master', ['page_title' => 'SMS-uri în curs de trimitere - OpenSMS'])

@section('content')

  @include('admin.topmenu')
  <div>
    <h3>SMS-uri trimise</h3>

    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Telefon</th>
          <th>Mesaj</th>
          <th>Data</th>
        </tr>
      </thead>
      <tbody>
      @foreach($mesaje as $sms)
        <tr>
          <td>{{ $sms->ID }}</td>
          <td>{{ $sms->DestinationNumber }}</td>
          <td>{{ $sms->TextDecoded }}</td>
          <td>{{ $sms->UpdateInDB }}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
{{ $mesaje->links() }}
  </div>
@endsection