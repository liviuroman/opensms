<?php

class AdminStatsController extends \BaseController {

  public function users()
  {
    $users = DB::table('users')->orderBy('created_at', 'desc')->paginate(10);
    return View::make('admin.users')->with(compact('users'));
  }

  public function mesaje()
  {
    $mesaje = DB::table('sms')->orderBy('sent_at', 'desc')->paginate(10);
    return View::make('admin.mesaje')->with(compact('mesaje'));
  }

  public function pending()
  {
    $mesaje = Outbox::paginate(10);
    return View::make('admin.pending')->with(compact('mesaje'));
  }

}