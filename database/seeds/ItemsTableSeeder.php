<?php

use App\Item;
use App\Product;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        foreach ($products as $product){
            factory(Item::class, 7)->create([
                'product_id' => $product->id
            ]);
        }
    }
}
