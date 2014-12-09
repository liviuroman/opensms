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
      'limit' => 'Ai atins limita maximă de SMS-uri pentru ziua de astăzi.',
      'blocked' => 'Nu se poate trimite mesajul către acest numâr; numârul introdus este blocat din cauza unor abuzuri.',
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

      /* salveaza mesajul in outbox/milan pentru trimitere */
      $outbox = new Outbox;
      $outbox->InsertIntoDB = date('Y-m-d H:i:s');
      $outbox->DestinationNumber = Input::get('telefon');
      $outbox->TextDecoded = Input::get('mesaj');
      $outbox->save();

      /* salveaza mesajul in localdb */
      $sms = new Sms;
      $sms->telefon = Input::get('telefon');
      $sms->mesaj = Input::get('mesaj');
      $sms->uid = Auth::user()->id;
      $sms->from = 'site';
      $sms->sent_at = date('Y-m-d H:i:s');
      $sms->save();

      return Redirect::to('sms')->with('success', 'Mesajul tău este în curs de trimitere');
    }
  }


  public function sent()
  {
    $mesaje = Sms::where('uid', '=', Auth::user()->id)->orderBy('sent_at', 'desc')->paginate(10);
    
    return View::make('sms.sent')->with(compact('mesaje'));
  }

  public function inbox()
  {
    $mesaje = Inbox::where('SenderNumber', '!=', 'MyVodafone')
                  ->where('SenderNumber', '!=', 'Vodafone')
                  ->orderBy('ReceivingDateTime', 'desc')
                  ->remember(1)
                  ->paginate(20);
    
    return View::make('sms.inbox')->with(compact('mesaje'));
  }

}