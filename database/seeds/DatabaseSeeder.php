<?php

use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 25)->create();
        factory(Category::class, 10)->create();
        factory(Product::class, 50)->create();
        factory(Coupon::class, 5)->create();
    }
}
