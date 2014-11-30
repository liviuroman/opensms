@extends('master', ['page_title' => 'Intrebari frecvente - OpenSMS'])

@section('content')
<div>

<h3>Intrebări frecvente</h3>

<hr>

<p><b>Chiar este gratis?</b></p>
<p>Da, OpenSMS este complet gratuit și momentan nu am planuri de monetizare.</p>

<hr>

<p><b>Există limitări?</b></p>
<p>Din păcate există limitări, acestea sunt puse doar din considerente anti-abuz. Fiecare utilizator poate trimite maxim 5 SMS-uri gratuite/zi. Această limită se poate ridica daca aveți un motiv intemeiat - <a href="{{ URL::to('contact') }}">contactați-mă</a> pentru a modifica această limită.</p>

<hr>

<p><b>Ce număr de telefon este folosit pentru trimiterea SMS-urilor?</b></p>
<p>Toate mesajele sunt trimise de pe numărul de telefon <b>0728 308 646</b>.</p>

<hr>

<p><b>Cum raportez un abuz?</b></p>
<p>În cazul în care primești mesaje abuzive de la acest număr, poți folosi <a href="{{ URL::to('contact') }}">formularul de contact</a> pentru a raporta acest lucru. Contul care a cauzat acest abuz va fi șters definitiv.</p>

<hr>

<p><b>Mesajul trimis conține semnătura OpenSMS?</b></p>
<p>Nu, niciun mesaj trimis nu este branduit sau semnat de OpenSMS. De aceea recomandarea mea este să vă semnați când trimiteți un SMS.</p>

<hr>

<p><b>Ce înseamnă "BETA"?</b></p>
<p>Serviciul OpenSMS este momentan în stadiul "<i>beta</i>", adică "<i>încă mai fac retușuri</i>" sau "<i>în teste</i>" sau "<i>îmi doresc să meargă totul bine pentru a avea succes</i>". Din păcate nu pot garanta 100% trimiterea mesajelor, mă bazez pe anumite părți hardware și software care încă mai pot face cum vor ele și nu cum le spun eu.</p>

<hr>

<p><b>Cum folosesc API-ul OpenSMS?</b></p>
<p>Documentația API se găsește aici: <a href="{{ URL::to('api') }}">http://opensms.ro/api</a>.</p>

<hr>

<p><b>Au mai fost și alte servicii de SMS gratis și s-au închis</b></p>
<p>Și OpenSMS poate avea aceeași șansă, dar hai să nu mai cobim :-)</p>

<hr>

<p><b>Cum pot să ajut proiectul OpenSMS?</b></p>
<p>Mă bucur că ai pus această întrebare și că vrei să ajuți un proiect non-profit. Sunt 2 metode prin care poți contribui la proiectul OpenSMS:</p>
  <ol>
    <li>Poți dona orice sumă prin intermediul PayPal<br />
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="MYKB29UJHWAE4">
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
      </form>
      această sumă este folosită pentru a alimenta cu credit cartela de pe care sunt trimise SMS-urile și pentru a îmbunătății configurația hardware a proiectului;</li>
    <li>Dacă ești dezvoltator și dorești să contribui la codul OpenSMS o poți face prin intermediul GitHub (<a href="http://github.com/memelea/opensms" target="_blank" title="OpenSMS on GitHub">http://github.com/memelea/opensms</a>);</li>
  </ol>
  <ul>
    <li>Pe lista mea de dorințe: <a href="http://profitshare.ro/l/1130185" target="_blank">MicroServer HP ProLiant Gen8</a> - acesta va fi folosit pentru a înlocui vechiul "server".</li>
  </ul>
</p>

<hr>

<p><b>Vreau să-mi șterg contul. Cum procedez?</b></p>
<p>Trimite un email cu codul tău API (pe care îl găsești în <a href="{{ URL::to('user/account') }}">contul tău</a>) și promit să îți șterg contul complet, inclusiv toată activitatea ta de pe OpenSMS.</p>

<p>&nbsp;</p>

</div>
@endsection