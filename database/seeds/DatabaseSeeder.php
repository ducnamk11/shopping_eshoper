<?php

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
        factory(\App\User::class,1)->create();
        factory(\App\Models\Category::class,4)->create();
        factory(\App\Models\Menu::class,4)->create();
        factory(\App\Models\Product::class,10)->create();
    }
}
