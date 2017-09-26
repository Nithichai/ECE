<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_rewards', function (Blueprint $table) {
          $table->increments('id');
          $table->char('student_id', 13)->unique();
          $table->char('name');
          $table->char('rank');
          $table->date('date');
          $table->char('place');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_rewards');
    }
}
