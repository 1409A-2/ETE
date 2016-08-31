<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEteReleaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ete_release', function (Blueprint $table) {
            $table->increments('re_id');
            $table->integer('re_time');
            $table->string('re_name',30);
            $table->string('re_depart',30);
            $table->integer('re_salary');
            $table->tinyInteger('re_education');
            $table->text('re_desc');
            $table->string('re_welfare',60);
            $table->string('re_address',100);
            $table->integer('i_id');
            $table->integer('c_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ete_release');
    }
}
