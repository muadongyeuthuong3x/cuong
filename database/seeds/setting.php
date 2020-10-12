<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class setting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('setting')->insert([
        'sdt'=>'0346997607',
        'email'=>'vietnam@gmail.com'
       ]);
    }
}
