<?php

class SmsController extends \BaseController {

  public function send()
  {
    /* verificare daca s-a atins numarul maxim de SMSuri pe zi */
    Validator::extend('limit', function ($attribute, $value, $parameters, $messages) 
    {
      if(Auth::user()->limit <= Sms::where('uid', '=', Auth::user()->id)->where('sent_at', '>=', date('Y-m-d'))->where('sent_at', '<', date("Y-m-d", time() + 86400))->count())
      {
        return false;
      } else {
        return true;
      }
    });

    /* verificare daca numarul este blocat */
    Validator::extend('blocked', function ($attribute, $value, $parameters, $messages) 
    {
      if(DB::table('blocked')->where('telefon',Input::get('telefon'))->count() >= 1)
      {
        return false;
      } else {
        return true;
      }
    });

    /* Mesajele de eroare in cazul validarii by limit/blocked */
    $messages = array(
      'limit' => 'Ai atins limita maxima de SMS-uri pentru ziua de astazi.',
      'blocked' => 'Nu se poate trimite mesajul catre acest numar; numarul introdus este blocat din cauza unor abuzuri.',
    );

    $rules = array(
                'telefon' => 'required|digits:10|blocked',
                'mesaj' => 'required|min:1|max:160|limit'
              );
    $validation = Validator::make(Input::all(), $rules, $messages);

    if($validation->fails())
    {
      return Redirect::to('sms')->withErrors($validation)->withInput();
    } else {

      $sms = new Sms;

      $sms->telefon = Input::get('telefon');
      $sms->mesaj = Input::get('mesaj');
      $sms->uid = Auth::user()->id;
      $sms->from = 'site';
      $sms->sent_at = date('Y-m-d H:i:s');

      $sms->save();

      // comanda de trimitere mesaj
      SSH::run(
        array('echo "'. Input::get('mesaj') .'" | sudo -u gammu gammu-smsd-inject TEXT '. Input::get('telefon'))
      );

      return Redirect::to('sms')->with('success', 'Mesajul tau este in curs de trimitere');
    }
  }


  public function sent()
  {
    $mesaje = Sms::where('uid', '=', Auth::user()->id)->orderBy('sent_at', 'desc')->take(10)->get();
    
    return View::make('sms.sent')->with(compact('mesaje'));
  }

}