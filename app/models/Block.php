<?php

class Block extends Eloquent {

  protected $table = 'blocked';

  protected $fillable = array('telefon');

  public function getCreatedAtAttribute($date)
  {
    return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-M-Y');
  }

  public function getUpdatedAtAttribute($date)
  {
    return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-M-Y');
  }

}