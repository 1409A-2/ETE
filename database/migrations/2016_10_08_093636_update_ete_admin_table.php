<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEteAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin', function ($table) {
            $table->char('a_repwd',32);
            $table->string('a_nickname',30);
            $table->string('a_email',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin', function ($table) {
            $table->dropColumn('a_repwd');
            $table->dropColumn('a_nickname');
            $table->dropColumn('a_email');
        });
    }
}
