<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
  protected $table = 'opleidingen';
  public $timestamps = false;
  protected $primaryKey = 'opleiding_id';
}
