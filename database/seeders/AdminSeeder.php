<?php

namespace Database\Seeders;

use App\Models\admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\admin::factory(10)->create();   
     }

}
