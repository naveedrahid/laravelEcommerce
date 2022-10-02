<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Slider;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(2)->create();
        Product::factory(2)->create();
        Order::factory(2)->create();
        User::factory(2)->create();
        Slider::factory(2)->create();
    }
}
