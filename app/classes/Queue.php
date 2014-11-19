<?php

class Queue
{

  public function fire($job, $data)
  {

    $user_credentials = $_ENV['boxcar_api'];
    $notification_title = 'Utilizator nou';
    $notification_message = 'Salut, un nou utilizator s-a inregistrat pe OpenSMS<br /><br />ID: ' . $data["id"] . '<br />Nume: ' . $data["name"] . '<br />Email: ' . $data["email"];
    $notification_sound = 'bird-1';
     
    curl_setopt_array(
      $chpush = curl_init(),
      array(
        CURLOPT_URL => "https://new.boxcar.io/api/notifications",
        CURLOPT_POSTFIELDS => array(
          "user_credentials" => $user_credentials,
          "notification[title]" => $notification_title,
          "notification[long_message]" => $notification_message,
          "notification[sound]" => $notification_sound,
        )
      )
    );
     
    $ret = curl_exec($chpush);
    curl_close($chpush);

    $job->delete();
  }  

}