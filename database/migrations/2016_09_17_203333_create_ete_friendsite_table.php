<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEteFriendsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friendsite', function (Blueprint $table) {
            $table->increments('site_id');
            $table->string('site_name',30);
            $table->string('site_img',100);
            $table->string('site_url',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('friendsite');
    }
}
