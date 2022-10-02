<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Product;

class ProducstTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::factory(2)->create();
    }
}
