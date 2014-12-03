@extends('master', ['page_title' => 'Documentație API - OpenSMS'])

@section('content')
<div>

<h3>Documentație API</h3>

<p>Această pagină este dedicată celor care doresc să integreze OpenSMS în aplicațiile lor. Aceeași limită de 5 SMS-uri/zi este valabilă și pentru SMS-urile trimise prin acest protocol.</p>

<hr>

<p><b>Cum trimit un SMS?</b></p>
<p>Cea mai simplă metodă este să trimiți un <b>POST request</b> cu ajutorul <b>CURL</b> folosind următorul model:</p>
<p><code>curl --data "api_code=<b>API_CODE</b>&amp;telefon=<b>TELEFON</b>&amp;mesaj=<b>MESAJ</b>" https://opensms.ro/api/send/</code></p>
<p>Cuvintele îngroșate trebuie înlocuite după cum urmează:</p>
<p>
  API_CODE - acesta se găsește în contul fiecărui utilizator<br />
  TELEFON - numărul de telefon căruia vrei să trimiți mesajul<br />
  MESAJ - mesajul pe care vrei să îl trimiți
</p>
<p>Răspunsul requestului este trimis înapoi în format JSON.</p>

<hr>

<p><b>Cum văd mesajele trimise?</b></p>
<p>Folosește următorul link pentru a extrage ultimele 20 mesaje (indiferent de unde au fost trimise, site sau api):</p>
<p><code>https://opensms.ro/api/sent/<b>API_CODE</b></code></p>
<p>API_CODE - acesta se găsește în contul fiecărui utilizator</p>
<p>Răspunsul requestului este trimis înapoi în format JSON.</p>

<hr>

<p><b>Cum văd câte mesaje mai pot trimite azi?</b></p>
<p>Prin intermediul unei simple interogări API:</p>
<p><code>https://opensms.ro/api/count/<b>API_CODE</b></code></p>
<p>Răspunsul returnat este un număr</p>


<p>&nbsp;</p>
</div>
@endsection