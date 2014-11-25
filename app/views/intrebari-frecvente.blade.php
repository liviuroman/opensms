@extends('master', ['page_title' => 'Intrebari frecvente - OpenSMS'])

@section('content')
<div>

<h3>Intrebari frecvente</h3>

<hr>

<p><b>Chiar este gratis?</b></p>
<p>Da, OpenSMS este complet gratuit si momentan nu am planuri de monetizare.</p>

<hr>

<p><b>Exista limitari?</b></p>
<p>Din pacate exista limitari, acestea sunt puse doar din considerente anti-abuz. Fiecare utilizator poate trimite maxim 5 SMS-uri gratuite/zi. Aceasta limita se poate ridica daca aveti un motiv intemeiat - <a href="{{ URL::to('contact') }}">contactati-ma</a> pentru a modifica aceasta limita.</p>

<hr>

<p><b>Ce numar de telefon este folosit pentru trimiterea SMSurilor?</b></p>
<p>Toate mesajele sunt trimise de pe numarul de telefon <b>0728 308 646</b>.</p>

<hr>

<p><b>Cum raportez un abuz?</b></p>
<p>In cazul in care primesti mesaje abuzive de la acest numar, poti folosi <a href="{{ URL::to('contact') }}">formularul de contact</a> pentru a raporta acest lucru. Contul care a cauzat acest abuz va fi inchis si sters definitiv.</p>

<hr>

<p><b>Mesajul trimis contine semnatura OpenSMS?</b></p>
<p>Nu, niciun mesaj trimis nu este branduit sau semnat de OpenSMS. De aceea recomandarea mea este sa va semnati cand trimiteti un SMS.</p>

<hr>

<p><b>Ce inseamna "BETA"?</b></p>
<p>Serviciul OpenSMS este momentan in stadiul "<i>beta</i>", adica "<i>inca mai fac retusuri</i>" sau "<i>in teste</i>" sau "<i>imi doresc sa mearga totul bine pentru a avea succes</i>". Din pacate nu pot garanta 100% trimiterea mesajelor, ma bazez pe anumite parti hardware si software care inca mai pot face cum vor ele si nu cum le spun eu.</p>

<hr>

<p><b>Cum folosesc API-ul OpenSMS?</b></p>
<p>Documentatia API se gaseste aici: <a href="{{ URL::to('api') }}">http://opensms.ro/api</a>.</p>

<hr>

<p><b>Au mai fost si alte servicii de SMS gratis si s-au inchis</b></p>
<p>Si OpenSMS poate avea aceeasi sansa, dar hai sa nu mai cobim :-)</p>

<hr>

<p><b>Cum pot sa ajut proiectul OpenSMS?</b></p>
<p>Ma bucur ca ai pus aceasta intrebare si ca vrei sa ajuti un proiect non-profit. Sunt 2 metode prin care poti contribui la proiectul OpenSMS:</p>
  <ol>
    <li>Poti dona orice suma prin intermediul PayPal<br />
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="MYKB29UJHWAE4">
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
      </form>
      aceasta suma este folosita pentru a alimenta cu credit cartela de pe care sunt trimise SMS-urile si pentru a imbunatatii configuratia hardware a proiectului;</li>
    <li>Daca esti developer si doresti sa contribui la codul OpenSMS o poti face prin intermediul GitHub (<a href="http://github.com/memelea/opensms" target="_blank" title="OpenSMS on GitHub">http://github.com/memelea/opensms</a>).</li>
  </ol>
</p>

<hr>

<p><b>Vreau sa-mi sterg contul. Cum procedez?</b></p>
<p>Trimite un email cu codul tau API (pe care il gasesti in <a href="{{ URL::to('user/account') }}">contul tau</a>) si promit sa iti sterg contul complet, inclusiv toata activitatea ta de pe OpenSMS.</p>

<p>&nbsp;</p>

</div>
@endsection