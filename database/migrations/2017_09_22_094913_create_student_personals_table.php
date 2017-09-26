<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentPersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_personals', function (Blueprint $table) {
          $table->increments('id');
          $table->char('student_id', 13)->unique();
          $table->char('thailand_id', 13)->unique();
          $table->char('name');
          $table->char('surname');
          $table->date('birthday');
          $table->char('address');
          $table->char('telephone');
          $table->char('facebook');
          $table->char('line');
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
        Schema::dropIfExists('student_personals');
    }
}
