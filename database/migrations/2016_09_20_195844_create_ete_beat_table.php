<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEteBeatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beat', function (Blueprint $table) {
            $table->increments('b_id');
            $table->string('b_name',30);
            $table->tinyInteger('b_sex',1);
            $table->string('b_professional',30);
            $table->tinyInteger('b_workyear',2);
            $table->char('b_phone',11);
            $table->string('b_email',30);
            $table->integer('b_salary_start');
            $table->integer('b_salary_end');
            $table->integer('b_paidmonth');
            $table->string('b_status',50);
            $table->text('b_desc');
            $table->integer('b_uid');
            $table->tinyInteger('b_state')->default(0);
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
