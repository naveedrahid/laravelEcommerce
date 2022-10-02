<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Order::factory(2)->create();
    }
}
