<?php

class EmailNotificationOnRegistration
{

  public function fire($job, $data)
  {
    Mail::send('emails.confirmation', $data, function($message) {
      $message->to($data['email'])->subject('Confirmare cont - OpenSMS');
    });

    $job->delete();
  }

}