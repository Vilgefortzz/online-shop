<?php

use App\Product;
use App\Subcategory;
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
        $subcategories = Subcategory::all();
        foreach ($subcategories as $subcategory) {
            factory(Product::class, 4)->create([
                'subcategory_id' => $subcategory->id
            ]);
        }
    }
}
