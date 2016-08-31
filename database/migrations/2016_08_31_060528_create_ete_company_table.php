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
        Schema::create('ete_company', function (Blueprint $table) {
            $table->increments('c_id');
            $table->string('c_name',200);
            $table->string('c_email',30);
            $table->string('c_tel',20);
            $table->string('c_ceo',30);
            $table->string('c_website',50);
            $table->string('c_desc',100);
            $table->string('c_logo',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ete_company');
    }


}
