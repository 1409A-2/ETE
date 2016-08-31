<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEteUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ete_users', function (Blueprint $table) {
            $table->increments('u_id');
            $table->string('u_name',30);
            $table->char('u_pwd',32);
            $table->tinyInteger('u_sex');
            $table->string('u_email',30);
            $table->integer('u_resign');
            $table->string('r_openid',30);
            $table->string('r_access_token',100);
            $table->integer('u_cid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ete_users');
    }
}
