<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
  protected $table = 'school';
  public $timestamps = false;
  protected $primaryKey = 'school_id';
}
