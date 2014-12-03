@extends('master', ['page_title' => 'Mesaje trimise - OpenSMS'])

@section('content')
<div>

<h3>Mesaje trimise</h3>

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

<table class="table table-striped">
  <thead>
    <tr>
      <th>Catre</th>
      <th>Mesajul</th>
      <th>Data/Ora</th>
      <th>Sursa</th>
    </tr>
  </thead>

  <tbody>
    @foreach($mesaje as $sms)
      <tr>
        <td>{{ $sms->telefon }}</td>
        <td>{{ $sms->mesaj }}</td>
        <td>{{ $sms->sent_at }}</td>
        <td>{{ $sms->from }}</td>
      </tr>
    @endforeach
  </tbody>
</table>

{{ $mesaje->links() }}

</div>
@endsection