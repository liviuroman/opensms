<?php

class EmailNotificationOnRegistration
{

  public function fire($job, $data)
  {
    Mail::send('emails.confirmation', array('email' => $data['email'], 'code' => $data['code']), function($message) {
      $message->to($data['email'])->subject('Confirmare cont - OpenSMS');
    });
  }
  
}