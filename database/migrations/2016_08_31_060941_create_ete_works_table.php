<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEteWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ete_works', function (Blueprint $table) {
            $table->increments('e_id');
            $table->string('w_name',50);
            $table->string('w_url',80);
            $table->string('w_desc',100);
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
        Schema::drop('ete_works');
    }
}
