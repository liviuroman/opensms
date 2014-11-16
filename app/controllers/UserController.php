<?php

class UserController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
								'name' => 'required|min:2|max:32',
								'email' => 'required|email|max:255|unique:users',
								'password' => 'required|min:6|max:60|confirmed',
								'password_confirmation' => 'required|min:6|max:60',
							);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::to('user/create')->withErrors($validator)->withInput();
		} else {
			$user = new User;

			$user->name = Input::get('name');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
      $user->api_code = str_random(40);

			$user->save();

			Mail::send('emails.confirmation', array('email' => Input::get('email')), function($message) {
        $message->to(Input::get('email'))->subject('Confirmare cont - OpenSMS');
      });

			return Redirect::to('user/create')->with('success', 'Felicitari, contul tau a fost creat! Te rog verifica adresa de email pentru a verifica contul');
		}
	}


	public function confirm($email)
	{
		$user = User::where('email', '=', $email)->firstOrFail();

    if($user->active == false) {

      $user->active = true;
      $user->save();

      return Redirect::to('user/login')->with('success', 'Contul tau a fost activat! Te rugam sa te loghezi folosind forumarul de mai jos.');
    } else {
      return Redirect::to('user/login')->with('danger', 'Adresa ta de email nu a fost gasita sau contul este deja confirmat.');
    }
	}


	public function login()
	{
		$rules = array(
								'email' => 'required|email|max:255',
								'password' => 'required|min:6|max:60'
							);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::to('user/login')->withErrors($validator)->withInput();
		} else {
			$user = User::where('email', '=', Input::get('email'))->firstOrFail();

			if($user->active == true)
			{
				if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
				{
					return Redirect::to('sms');
				} else {
					return Redirect::to('user/login')->with('danger', 'Parola sau adresa de email sunt incorecte')->withInput();
				}
			} else {
				return Redirect::to('user/login')->with('danger', 'Contul tau nu este activ. Te rugam sa iti activezi contul folosind linkul primit pe adresa de email cu care te-ai inregistrat.')->withInput();
			}
		}

	}


	public function updatePassword()
	{
		Validator::extend('passcheck', function ($attribute, $value, $parameters) 
    {
      return Hash::check(Input::get('password_old'), Auth::user()->getAuthPassword());
    });
    $messages = array(
      'passcheck' => 'Parola veche este incorecta.',
    );

    $rules = array(
              'password_old'          => 'required|min:6|passcheck',
              'password'              => 'required|min:6|confirmed',
              'password_confirmation' => 'required|min:6'
            );
    $validator = Validator::make(Input::all(), $rules, $messages);

    

    if($validator->fails()){
      return Redirect::to('user/account')->withErrors($validator);
    } else {
      $user = User::where('id', '=', Auth::user()->id)->first();

      $user->password = Hash::make(Input::get('password'));

      $user->save();

      return Redirect::to('user/account')->with('success', 'Parola a fost actualizata');
    }
	}


  public function apiReset()
  {
    $user = User::find(Auth::user()->id);
    $user->api_code = str_random(40);

    $user->save();

    return Redirect::to('user/account')->with('success', 'Codul tau API a fost schimbat cu succes.');
  }


}