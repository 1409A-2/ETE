<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEteFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->increments('f_id');
            $table->text('f_feedback');
            $table->char('f_tel',11);
            $table->string('f_email',50);
            $table->integer('f_uid');
            $table->tinyInteger('f_status')->default(0);
            $table->integer('f_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('feedback');
    }
}
