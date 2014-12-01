@extends('master', ['page_title' => 'Documentație API - OpenSMS'])

@section('content')
<div>

<h3>Documentație API</h3>

<p>Această pagină este dedicată celor care doresc să integreze OpenSMS în aplicațiile lor. Aceeași limită de 5 SMS-uri/zi este valabilă și pentru SMS-urile trimise prin acest protocol.</p>

<hr>

<p><b>Cum trimit un SMS?</b></p>
<p>Trebuie să folosești următorul model atunci când vrei să trimiti un SMS prin intermediul API:</p>
<p><code>https://opensms.ro/api/send/API_CODE/TELEFON/MESAJ</code></p>
<p>
  API_CODE - acesta se găsește în contul fiecărui utilizator<br />
  TELEFON - numărul de telefon căruia vrei să trimiți mesajul<br />
  MESAJ - mesajul pe care vrei să îl trimiți
</p>
<p>Răspunsul requestului este trimis înapoi în format JSON.</p>

<hr>

<p><b>Cum văd mesajele trimise?</b></p>
<p>Folosește următorul link pentru a extrage ultimele 20 mesaje (indiferent de unde au fost trimise, site sau api):</p>
<p><code>https://opensms.ro/api/sent/API_CODE</code></p>
<p>API_CODE - acesta se găsește în contul fiecărui utilizator</p>
<p>Răspunsul requestului este trimis înapoi în format JSON.</p>

<hr>

<p><b>Cum văd câte mesaje mai pot trimite azi?</b></p>
<p>Prin intermediul unei simple interogări API:</p>
<p><code>https://opensms.ro/api/count/API_CODE</code></p>
<p>Răspunsul returnat este un număr</p>


<p>&nbsp;</p>
</div>
@endsection