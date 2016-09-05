<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEteRemuseResealeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume_reseale', function (Blueprint $table) {
            $table->increments('rere_id');
            $table->integer('r_id');
            $table->integer('re_id');
            $table->tinyInteger('resume_reseale')->default(0);
            $table->tinyInteger('read')->default(0);
            $table->integer('delivery_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('resume_reseale');
    }
}
