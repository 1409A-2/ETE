<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('industry')->insert([
            'i_name' => '技术',
            'i_pid' => 0,
            'i_hot' => 1,
        ]);
    }
}
