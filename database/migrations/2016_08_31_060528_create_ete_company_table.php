<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEteCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->increments('c_id');
            $table->string('c_name',200);
            $table->string('c_email',30);
            $table->string('c_tel',20);
            $table->string('c_ceo',30);
            $table->string('c_website',50);
            $table->string('c_desc',100);
            $table->string('c_logo',100);
            $table->tinyInteger('c_status')->default(0);
            $table->string('c_shorthand',30);
            $table->string('c_industry',30);
            $table->integer('out_time');
            $table->integer('out_num')->default(0);
            $table->text('c_intro');
            $table->text('ceo_desc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('company');
    }


}
