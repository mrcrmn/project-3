<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Brand', 200)->create()->each(function($brand) {
            $brand->products()->saveMany(factory('App\Product', 25)->make());
        });
    }
}
