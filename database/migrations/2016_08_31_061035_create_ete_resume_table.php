<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEteResumeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume', function (Blueprint $table) {
            $table->increments('r_id');
            $table->string('r_name',200);
            $table->tinyInteger('r_sex');
            $table->integer('r_education')->default(1);
            $table->string('r_photo',11);
            $table->string('r_email',30);
            $table->string('r_desc',100);
            $table->string('r_img',100);
            $table->tinyInteger('r_status');
            $table->integer('e_id');
            $table->integer('i_id');
            $table->integer('u_id');
            $table->integer('r_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('resume');
    }
}
