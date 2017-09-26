<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentPersonal extends Model
{
  protected $table = 'student_personals';

  public $timestamps = true;

  public function user(){
    return $this->belongsTo('App\User');
  }
}
