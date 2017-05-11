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

        $productsToSwords = ['miecz jednoręczny - dekoracyjny', 'miecz jednoręczny - dekoracyjny2', 'miecz jednoręczny - dekoracyjny3',
            'miecz jednoręczny - dekoracyjny4', 'miecz jednoręczny - dekoracyjny5', 'miecz jednoręczny - dekoracyjny6', 'miecz jednoręczny - szczerbiec'];
        $productsToAxes = ['axe'];
        $productsToShields = ['legion shield'];
        $productsToHelmets = ['helmet'];

        $swordsImages = ['/images/swords/1.jpg', '/images/swords/2.JPG', '/images/swords/3.JPG',
            '/images/swords/4.jpg', '/images/swords/5.JPG', '/images/swords/6.jpg', '/images/swords/7.jpg'];

        $axesImages = ['/images/axes/axe.JPG'];
        $shieldsImages = ['/images/shields/legion_shield.jpg'];
        $helmetsImages = ['/images/helmets/helmet.jpg'];

        $subcategories = Subcategory::all();

        $subcategorySwords = $subcategories->where('name', 'swords')->first();
        $subcategoryAxes = $subcategories->where('name', 'axes')->first();
        $subcategoryShields = $subcategories->where('name', 'shields')->first();
        $subcategoryHelmets = $subcategories->where('name', 'helmets')->first();

        for ($i = 0; $i < count($productsToSwords); $i++) {
            factory(Product::class)->create([
                'subcategory_id' => $subcategorySwords->id,
                'name' => $productsToSwords[$i],
                'path_to_image' => $swordsImages[$i],
                'quantity' => 5
            ]);
        }

        for ($i = 0; $i < count($productsToAxes); $i++) {
            factory(Product::class)->create([
                'subcategory_id' => $subcategoryAxes->id,
                'name' => $productsToAxes[$i],
                'path_to_image' => $axesImages[$i],
                'quantity' => 8
            ]);
        }

        for ($i = 0; $i < count($productsToShields); $i++) {
            factory(Product::class)->create([
                'subcategory_id' => $subcategoryShields->id,
                'name' => $productsToShields[$i],
                'path_to_image' => $shieldsImages[$i],
                'quantity' => 14
            ]);
        }

        for ($i = 0; $i < count($productsToHelmets); $i++) {
            factory(Product::class)->create([
                'subcategory_id' => $subcategoryHelmets->id,
                'name' => $productsToHelmets[$i],
                'path_to_image' => $helmetsImages[$i],
                'quantity' => 3
            ]);
        }

//        $subcategories = Subcategory::all();
//        foreach ($subcategories as $subcategory) {
//            factory(Product::class, 120)->create([
//                'subcategory_id' => $subcategory->id
//            ]);
//        }

//        foreach ($subcategories as $subcategory) {
//            factory(Product::class, 1)->create([
//                'subcategory_id' => $subcategory->id,
//                'recommended' => true
//            ]);
//        }
    }
}
