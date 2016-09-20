<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEteSubscribeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribe', function (Blueprint $table) {
            $table->increments('s_id');
            $table->string('s_email',50);
            $table->char('s_length',1);
            $table->string('s_position',20);
            $table->string('s_field',20);
            $table->string('s_salary',10);
            $table->integer('u_id');
            $table->integer('s_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('subscribe');
    }
}
