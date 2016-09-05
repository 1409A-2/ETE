<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEteExpectedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('expected', function (Blueprint $table) {
            $table->integer('r_id');
            $table->string('ex_name',30);
            $table->tinyInteger('re_salarymin');
            $table->tinyInteger('re_salarymax');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('expected');
    }
}
