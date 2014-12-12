<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

/* Homepage */
	Route::get('/', 'HomeController@index');


/* User account control*/
	Route::get('user/create', 'UserController@create')->before('guest');
	Route::post('user/create', 'UserController@store')->before('guest')->before('csrf');

	Route::get('user/login', function(){ return View::make('user.login'); })->before('guest');
	Route::post('user/login', 'UserController@login')->before('csrf');

	Route::get('user/reconfirm', function(){ return View::make('user.reconfirm'); })->before('guest');
	Route::post('user/reconfirm', 'UserController@reconfirm')->before('csrf');

	Route::get('user/confirm/{email}/{code}', 'UserController@confirm')->before('guest');
	Route::get('user/logout', function(){ Auth::logout(); return Redirect::to('/'); });

	Route::get('user/account', function(){ return View::make('user.account'); })->before('auth');
	Route::post('user/account', 'UserController@updatePassword')->before('csrf')->before('auth');
	Route::post('user/apireset', 'UserController@apiReset')->before('csrf')->before('auth');


/* Forgot password */
	Route::controller('password', 'RemindersController');


/* SMS-manager */
	Route::get('sms', function(){ return View::make('sms.index'); })->before('auth');
	Route::get('sms/sent', 'SmsController@sent')->before('auth');
	Route::post('sms/send', 'SmsController@send')->before('csrf')->before('auth');
	Route::get('sms/inbox', 'SmsController@inbox')->before('auth');


/* API */
	Route::get('api', function(){ return View::make('api'); });
	Route::get('api/send/{api_code}/{telefon}/{mesaj}', 'ApiController@send1'); //versiunea veche de trimis SMS prin api
	Route::post('api/send', 'ApiController@send2'); // versiune noua de trimis SMS prin api
	Route::get('api/sent/{api_code}', 'ApiController@sent');
	Route::get('api/count/{api_code}', 'ApiController@count');
	// opensms.app/api/send/NyKRLvWjr5gosFGHj0XD6vbEzMqdPrWpYWBb3ZOj/0745980598/test


/* Noutati */
	Route::get('news', 'NewsController@index');
	Route::get('news/rss', 'NewsController@rss');
	Route::get('news/{id}', 'NewsController@show');

/* Admin panel */
	Route::get('admin', function(){ return Redirect::to('admin/news'); });

	Route::group(array('before'=>'admin'), function() {
		Route::resource('admin/news', 'AdminNewsController', array('except' => array('show')));
		Route::resource('admin/numereblocate', 'AdminBlockController', array('except' => array('create', 'show')));
		Route::get('admin/users', 'AdminStatsController@users');
		Route::get('admin/mesaje', 'AdminStatsController@mesaje');
		Route::get('admin/pending', 'AdminStatsController@pending');
	});


/* Static pages */
	Route::get('despre', 'HomeController@despre');
	Route::get('intrebari-frecvente', function(){ return View::make('intrebari-frecvente'); });
	Route::get('contact', function(){ return View::make('contact'); });
	Route::post('contact', 'ContactController@send')->before('csrf');


/* Catch exceptions */
	App::error(function(ModelNotFoundException $e)
	{
	 return Redirect::to('user/login')->with('danger', 'Adresa de email pe care incerci sa o validezi nu exista in baza noastra de date.');
	});

/* Custom 404 page */
	App::missing(function($exception)
	{
    return Response::view('404', array(), 404);
  });

/* Push Queues */
	Route::post('queue/push', function() { return Queue::marshal(); });


/* Webmaster tools and others */
	Route::get('google384a3eb739aea99b.html', function(){ return 'google-site-verification: google384a3eb739aea99b.html'; });

/* Validare profitshare */
	Route::get('9a048a1ac2d717a950299c92c27b3d10', function(){ return '9a048a1ac2d717a950299c92c27b3d10'; });

/* Validare loader.io */
	Route::get('loaderio-436f3555de993e80d01ebf3b7c9d97ad.txt', function(){ return 'loaderio-436f3555de993e80d01ebf3b7c9d97ad'; });