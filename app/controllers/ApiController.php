<?php

class ApiController extends BaseController {

  public function send1($api_code, $telefon, $mesaj)
  {
    if (strlen((string)$api_code) != 40){
      return Response::json(array('error' => 'Lungimea codului API folosit nu este corectă'));
    }

    $auth = User::whereRaw('BINARY api_code = ?', array($api_code))->first();

    /* verificare cod api */
    if($auth === null){
      return Response::json(array('error' => 'Codul API folosit nu se găsește în baza de date'));
    }

    /* verificare daca s-a atins numarul maxim de SMSuri pe zi */
    if($auth->limit <= Sms::where('uid', '=', $auth->id)->where('sent_at', '>=', date('Y-m-d'))->where('sent_at', '<', date("Y-m-d", time() + 86400))->count())
    {
      return Response::json(array('error' => 'Ai atins limita maximă de SMS-uri pentru ziua de astăzi'));
    }

    /* verificare daca numarul este blocat */
    if(DB::table('blocked')->where('telefon', $telefon)->count() >= 1)
    {
      return Response::json(array('error' => 'Nu se poate trimite mesajul către acest număr - numărul introdus este blocat din cauza unor abuzuri'));
    }

    /* verificare numar de telefon */
    if(strlen((string)$telefon) != 10){
      return Response::json(array('error' => 'Numărul de telefon este greșit - acesta trebuie să conțină fix 10 cifre'));
    }

    if(!is_numeric($telefon)){
      return Response::json(array('error' => 'Numărul de telefon este greșit - acesta trebuie să conțină fix 10 cifre'));
    }

    /* verificare mesaj */
    if(strlen((string)$mesaj) > 160){
      return Response::json(array('error' => 'Mesajul tău este mai mare de 160 de caractere'));
    }

    /* salveaza mesajul in outbox/milan pentru trimitere */
    $outbox = new Outbox;
    $outbox->InsertIntoDB = date('Y-m-d H:i:s');
    $outbox->DestinationNumber = $telefon;
    $outbox->TextDecoded = $mesaj;
    $outbox->save();

    /* salveaza mesajul in localdb */
    $sms = new Sms;
    $sms->telefon = $telefon;
    $sms->mesaj = $mesaj;
    $sms->uid = $auth->id;
    $sms->from = 'api1';
    $sms->sent_at = date('Y-m-d H:i:s');
    $sms->save();

    return Response::json(array('success' => 'Mesajul tău este în curs de trimitere'));
  }


  public function send2()
  {
    $api_code = Input::get('api_code');
    $telefon = Input::get('telefon');
    $mesaj = Input::get('mesaj');

    if (strlen((string)$api_code) != 40){
      return Response::json(array('error' => 'Lungimea codului API folosit nu este corectă'));
    }

    $auth = User::whereRaw('BINARY api_code = ?', array($api_code))->first();

    /* verificare cod api */
    if($auth === null){
      return Response::json(array('error' => 'Codul API folosit nu se găsește în baza de date'));
    }

    /* verificare daca s-a atins numarul maxim de SMSuri pe zi */
    if($auth->limit <= Sms::where('uid', '=', $auth->id)->where('sent_at', '>=', date('Y-m-d'))->where('sent_at', '<', date("Y-m-d", time() + 86400))->count())
    {
      return Response::json(array('error' => 'Ai atins limita maximă de SMS-uri pentru ziua de astăzi'));
    }

    /* verificare daca numarul este blocat */
    if(DB::table('blocked')->where('telefon', $telefon)->count() >= 1)
    {
      return Response::json(array('error' => 'Nu se poate trimite mesajul către acest număr - numărul introdus este blocat din cauza unor abuzuri'));
    }

    /* verificare numar de telefon */
    if(strlen((string)$telefon) != 10){
      return Response::json(array('error' => 'Numărul de telefon este greșit - acesta trebuie să conțină fix 10 cifre'));
    }

    if(!is_numeric($telefon)){
      return Response::json(array('error' => 'Numărul de telefon este greșit - acesta trebuie să conțină fix 10 cifre'));
    }

    /* verificare mesaj */
    if(strlen((string)$mesaj) > 160){
      return Response::json(array('error' => 'Mesajul tău este mai mare de 160 de caractere'));
    }

    /* salveaza mesajul in outbox/milan pentru trimitere */
    $outbox = new Outbox;
    $outbox->InsertIntoDB = date('Y-m-d H:i:s');
    $outbox->DestinationNumber = $telefon;
    $outbox->TextDecoded = $mesaj;
    $outbox->save();

    /* salveaza mesajul in localdb */
    $sms = new Sms;
    $sms->telefon = $telefon;
    $sms->mesaj = $mesaj;
    $sms->uid = $auth->id;
    $sms->from = 'api2';
    $sms->sent_at = date('Y-m-d H:i:s');
    $sms->save();

    return Response::json(array('success' => 'Mesajul tău este în curs de trimitere'));

  }


  public function sent($api_code)
  {
    $auth = User::whereRaw('BINARY api_code = ?', array($api_code))->first();

    if($auth === null){
      return Response::json(array('error' => 'Codul API folosit nu se găsește în baza de date'));
    } else {
      $sms = Sms::where('uid', '=', $auth->id)->take(20)->orderBy('sent_at', 'desc')->get(array('telefon', 'mesaj', 'from', 'sent_at'))->toArray();
      
      return $sms;
    }

  }

  public function count($api_code)
  {
    $user = User::whereRaw('BINARY api_code = ?', array($api_code))->first();
    
    if($user === null){
      return 0;
    } else {

      $today = Sms::where('uid', '=', $user->id)
                  ->where('sent_at', '>=', date('Y-m-d'))
                  ->where('sent_at', '<', date("Y-m-d", time() + 86400))
                  ->count();

      return $user->limit - $today;
    }
  }
  

}