<?php

class HomeController extends BaseController {

	public function index()
	{
		return View::make('index');
	}

  public function despre()
  {
    $users = User::all()->count();
    $mesaje = Sms::all()->count();

    return View::make('despre')->with(compact('users', 'mesaje'));
  }

}
