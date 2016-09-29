<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEteAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('a_id');
            $table->string('a_name',30);
            $table->char('a_pwd',32);
            $table->char('a_repwd',32);
            $table->string('a_nickname',32);
            $table->string('a_email',30);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin');
    }
}
