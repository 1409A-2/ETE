<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEteConvenientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenient', function (Blueprint $table) {
            $table->increments('ct_id');
            $table->char('ct_type',50);
            $table->string('ct_openid',32);
            $table->string('ct_access_token',32);
            $table->integer('u_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('convenient');
    }
}
