<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEteCollectedPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collected_position', function (Blueprint $table) {
            $table->increments('col_id');
            $table->integer('col_time');
            $table->integer('u_id');
            $table->integer('re_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('collected_position');
    }
}
