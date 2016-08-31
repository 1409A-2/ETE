<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtePorjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ete_porject', function (Blueprint $table) {
            $table->increments('p_id');
            $table->string('p_name',50);
            $table->string('p_duties',30);
            $table->integer('p_start_time');
            $table->integer('p_end_time');
            $table->text('p_desc');
            $table->integer('r_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
