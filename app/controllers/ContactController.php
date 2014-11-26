<?php

class ContactController extends BaseController {

  public function send()
  {
    $rules = array (
                  'name'    => 'required|min:2',
                  'email'   => 'required|email',
                  'message' => 'required|min:5',
                  );

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails()){
      return Redirect::to('contact')->withErrors($validator)->withInput();
    } else {
      
      $name = Input::get('name');
      $email = Input::get('email');
      $mesaj = Input::get('message');

      $data = array(
                'name'    => $name,
                'email'   => $email,
                'mesaj' => $mesaj,
              );

      Mail::send('emails.contact', $data, function($message) use($name, $email, $mesaj) {
        $message->to('opensms@doiochi.ro')->subject('Contact form - OpenSMS');
      });

      return Redirect::to('contact')->with('success', 'Mulțumim, mesajul tău a fost trimis');
    }
  }

}