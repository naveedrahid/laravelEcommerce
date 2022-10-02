<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use User;

class UesrTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(2)->create();
    }
}
