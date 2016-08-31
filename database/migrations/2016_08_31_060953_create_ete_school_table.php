<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEteSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ete_school', function (Blueprint $table) {
            $table->increments('s_id');
            $table->string('s_name',50);
            $table->integer('s_education');
            $table->string('s_major',50);
            $table->integer('s_start_time');
            $table->integer('s_end_time');
            $table->integer('r_id');
            $table->integer('ed_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ete_enclosure');
    }
}
