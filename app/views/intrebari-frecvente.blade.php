@extends('master')

@section('content')
<div>

<h3>Intrebari frecvente</h3>
<br />

<p>
  <b>Chiar este gratis?</b><br />
  Da, OpenSMS este complet gratuit si momentan nu am planuri de monetizare.
</p>

<p>
  <b>Exista limitari?</b><br />
  Din pacate exista limitari, acestea sunt puse doar din considerente anti-abuz. Fiecare utilizator poate trimite maxim 5 SMS-uri gratuite/zi. Aceasta limita se poate ridica daca aveti un motiv intemeiat - <a href="{{ URL::to('contact') }}">contactati-ma</a> pentru a modifica aceasta limita.
</p>

<p>
  <b>Ce numar de telefon este folosit pentru trimiterea SMSurilor?</b><br />
  Toate mesajele sunt trimise de pe numarul de telefon <b>0728 308 646</b>.
</p>

<p>
  <b>Cum raportez un abuz?</b><br />
  In cazul in care primesti mesaje abuzive de la acest numar, poti folosi <a href="{{ URL::to('contact') }}">formularul de contact</a> pentru a raporta acest lucru. Contul care a cauzat acest abuz va fi inchis si sters definitiv.
</p>

<p>
  <b>Mesajul trimis contine semnatura OpenSMS?</b><br />
  Nu, niciun mesaj trimis nu este branduit sau semnat de OpenSMS. De aceea recomandarea mea este sa va semnati cand trimiteti un SMS.
</p>

<p>
  <b>Ce inseamna "BETA"?</b><br />
  Serviciul OpenSMS este momentan in stadiul "<i>beta</i>", adica "<i>inca mai fac retusuri</i>" sau "<i>in teste</i>" sau "<i>imi doresc sa mearga totul bine pentru a avea succes</i>". Din pacate nu pot garanta 100% trimiterea mesajelor, ma bazez pe anumite parti hardware si software care inca mai pot face cum vor ele si nu cum le spun eu.
</p>

<p>
  <b>Cum trimit un SMS prin intermediul API?</b><br />
  Simplu! Trebuie sa folosesti urmatorul model atunci cand trimiti un request prin intermediul API:<br /><br />
  <code>http://opensms.ro/api/send/API_CODE/TELEFON/MESAJ</code><br />
  API_CODE - acesta se gaseste in contul fiecarui utilizator<br />
  TELEFON - numarul de telefon caruia vrei sa iti trimiti mesajul<br />
  MESAJ - mesajul pe care vrei sa il trimiti<br /><br />
  Raspunsul requestului este trimis inapoi in format JSON.
</p>

<p>
  <b>Au mai fost si alte servicii de SMS gratis si s-au inchis</b><br />
  Si OpenSMS poate avea aceeasi sansa, dar hai sa nu mai cobim :-)
</p>

<p>
  <b>Cum pot sa ajut proiectul OpenSMS?</b><br />
  Ma bucur ca ai pus aceasta intrebare si ca vrei sa ajuti un proiect non-profit. Sunt 2 metode prin care poti contribui la proiectul OpenSMS:<br>
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

<p>
  <b>Vreau sa-mi sterg contul. Cum procedez?</b><br />
  Trimite un email cu codul tau API (pe care il gasesti in <a href="{{ URL::to('user/account') }}">contul tau</a>) si promit sa iti sterg contul complet, inclusiv toata activitatea ta de pe OpenSMS.
</p>

<p><b>In curs de actualizare...</b></p>

</div>
@endsection