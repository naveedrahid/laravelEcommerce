<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Slider;

class SLiderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Slider::factory(2)->create();
    }
}
