<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtePowerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('power', function (Blueprint $table) {
            $table->increments('p_id');
            $table->string('p_name',30);
            $table->integer('parent_id');
            $table->char('p_route',30);
            $table->tinyInteger('p_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('power');
    }
}
