<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentReward extends Model
{
  protected $table = 'student_rewards';

  public $timestamps = true;

  public function user(){
    return $this->belongsTo('App\User');
  }
}
