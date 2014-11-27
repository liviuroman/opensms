@extends('master', ['page_title' => 'Despre OpenSMS - află mai multe despre proiectul OpenSMS'])

@section('content')
<div>

<h3>Despre</h3>

<p>OpenSMS este un proiect <em>personal</em>, <em>non-profit</em> care oferă posibilitatea trimiterii de <b>SMS-uri gratuit</b> către orice telefon mobil din România. Fiecare utilizator înregistrat poate trimite până la 5 SMS-uri în fiecare zi.</p>

<p>Serviciul poate fi folosit de către oricine, dar a fost conceput în ideea de a ajuta dezvoltatorii să integreze alerte SMS în aplicațiile lor.</p>

<p>&nbsp;</p>

<p><b>Statistici real-time</b></p>
<ul>
  <li>Utilizatori inregistrati: {{ $users }}</li>
  <li>Mesaje trimise: {{ $mesaje }}</li>
</ul>

<p>&nbsp;</p>
</div>
@endsection