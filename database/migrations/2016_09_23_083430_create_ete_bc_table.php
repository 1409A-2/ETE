<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEteBcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bc', function (Blueprint $table) {
            $table->increments('bc_id');
            $table->integer('bc_cid');
            $table->integer('cb_bid');
            $table->tinyInteger('cb_cb');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('beat');
    }
}
