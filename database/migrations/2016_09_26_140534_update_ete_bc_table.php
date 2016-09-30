<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEteBcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bc', function ($table) {
            $table->integer('cb_time');
            $table->string('cb_reason',50);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bc', function ($table) {
            $table->dropColumn('cb_time');
            $table->string('cb_reason');
        });

    }
}
