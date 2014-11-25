<?php

class ApiController extends BaseController {

  public function send($api_code, $telefon, $mesaj)
  {
    $auth = User::where('api_code', '=', $api_code)->first();

    /* verificare cod api */
    if($auth === null){
      return Response::json(array('error' => 'Codul API folosit nu se gaseste in baza de date'));
    }

    /* verificare daca s-a atins numarul maxim de SMSuri pe zi */
    if($auth->limit <= Sms::where('uid', '=', $auth->id)->where('sent_at', '>=', date('Y-m-d'))->where('sent_at', '<', date("Y-m-d", time() + 86400))->count())
    {
      return Response::json(array('error' => 'Ai atins limita maxima de SMS-uri pentru ziua de astazi'));
    }

    /* verificare daca numarul este blocat */
    if(DB::table('blocked')->where('telefon', $telefon)->count() >= 1)
    {
      return Response::json(array('error' => 'Nu se poate trimite mesajul catre acest numar - numarul introdus este blocat din cauza unor abuzuri'));
    }

    /* verificare numar de telefon */
    if(strlen((string)$telefon) != 10){
      return Response::json(array('error' => 'Numarul de telefon este gresit - acesta trebuie sa contina fix 10 cifre'));
    }

    if(!is_numeric($telefon)){
      return Response::json(array('error' => 'Numarul de telefon este gresit - acesta trebuie sa contina fix 10 cifre'));
    }

    /* verificare mesaj */
    if(strlen((string)$mesaj) > 160){
      return Response::json(array('error' => 'Mesajul tau este mai mare de 160 de caractere'));
    }

    $sms = new Sms;

    $sms->telefon = $telefon;
    $sms->mesaj = $mesaj;
    $sms->uid = $auth->id;
    $sms->from = 'api';
    $sms->sent_at = date('Y-m-d H:i:s');

    $sms->save();

    // comanda de trimitere mesaj
    SSH::run(
      array('echo "'. $mesaj .'" | sudo -u gammu gammu-smsd-inject TEXT '. $telefon)
    );

    return Response::json(array('success' => 'Mesajul tau este in curs de trimitere'));
  }


  public function sent($api_code)
  {
    $auth = User::where('api_code', '=', $api_code)->first();

    if($auth === null){
      return Response::json(array('error' => 'Codul API folosit nu se gaseste in baza de date'));
    } else {
      $sms = Sms::where('uid', '=', $auth->id)->take(20)->get(array('telefon', 'mesaj', 'from', 'sent_at'))->toArray();;
      
      return $sms;
    }

  }
  

}