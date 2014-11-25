@extends('master', ['page_title' => 'Documentatie API - OpenSMS'])

@section('content')
<div>

<h3>Documentatie API</h3>

<p>Aceasta pagina este dedicata celor care doresc sa integreze OpenSMS in aplicatiile lor. Aceeasi limita de 5 SMS-uri/zi este valabila si pentru SMS-urile trimise prin acest protocol.</p>

<hr>

<p><b>Cum trimit un SMS?</b></p>
<p>Trebuie sa folosesti urmatorul model atunci cand vrei sa trimiti un SMS prin intermediul API:</p>
<p><code>http://opensms.ro/api/send/API_CODE/TELEFON/MESAJ</code></p>
<p>
  API_CODE - acesta se gaseste in contul fiecarui utilizator<br />
  TELEFON - numarul de telefon caruia vrei sa iti trimiti mesajul<br />
  MESAJ - mesajul pe care vrei sa il trimiti
</p>
<p>Raspunsul requestului este trimis inapoi in format JSON.</p>

<hr>

<p><b>Cum vad mesajele trimise?</b></p>
<p>Foloseste urmatorul link pentru a extrage ultimele 20 mesaje (indiferent de unde au fost trimise, site sau api):</p>
<p><code>http://opensms.ro/api/sent/API_CODE</code></p>
<p>API_CODE - acesta se gaseste in contul fiecarui utilizator</p>
<p>Raspunsul requestului este trimis inapoi in format JSON.</p>
<p>&nbsp;</p>
</div>
@endsection