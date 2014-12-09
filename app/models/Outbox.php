<?php

class Outbox extends Eloquent {

  protected $table = 'outbox';
  public $timestamps = false;
  protected $connection = 'milan';

}