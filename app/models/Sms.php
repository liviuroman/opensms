<?php

class Sms extends Eloquent {

  protected $table = 'sms';

  public $timestamps = false;

  protected $fillable = array('telefon', 'mesaj');

}