@extends('master', ['page_title' => 'Mesaje primite - OpenSMS'])

@section('content')
<div>

<h3>Mesaje primite</h3>
<div class="alert alert-info" role="alert">
  Aici se regăsesc toate mesajele primite pe numărul de telefon folosit la trimiterea tuturor mesajelor de pe OpenSMS. Aceste mesaje se șterg periodic și nu se păstrează nicio copie de rezervă.
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>De la</th>
      <th>Mesajul</th>
      <th>Data/Ora</th>
    </tr>
  </thead>

  <tbody>
    @foreach($mesaje as $sms)
      <tr>
        <td>07XXX{{ substr_replace($sms->SenderNumber, 'XX', 0, -3) }}</td>
        <td>{{ $sms->TextDecoded }}</td>
        <td>{{ $sms->ReceivingDateTime }}</td>
      </tr>
    @endforeach
  </tbody>
</table>

{{ $mesaje->links() }}

</div>
@endsection