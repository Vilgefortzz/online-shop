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

        $productsToSwords = [
            'FINE AND RARE BOLIVIAN OFFICER’S SWORD',
            'miecz jednoręczny - dekoracyjny2', 'miecz jednoręczny - dekoracyjny3',
            'miecz jednoręczny - dekoracyjny4', 'miecz jednoręczny - dekoracyjny5', 'miecz jednoręczny - dekoracyjny6', 'miecz jednoręczny - szczerbiec'
        ];

        $productsToAxes = ['axe'];
        $productsToShields = ['legion shield'];
        $productsToHelmets = ['helmet'];

        $swordsThumbnails = [
            '/images/thumbnails/swords/1.jpg', '/images/thumbnails/swords/2.jpg', '/images/thumbnails/swords/3.jpg',
            '/images/thumbnails/swords/4.jpg', '/images/thumbnails/swords/5.jpg', '/images/thumbnails/swords/6.jpg', '/images/thumbnails/swords/7.jpg'
        ];

        $axesThumbnails = ['/images/thumbnails/axes/axe.jpg'];
        $shieldsThumbnails = ['/images/thumbnails/shields/legion_shield.jpg'];
        $helmetsThumbnails = ['/images/thumbnails/helmets/helmet.jpg'];

        $subcategories = Subcategory::all();

        $subcategorySwords = $subcategories->where('name', 'swords')->first();
        $subcategoryAxes = $subcategories->where('name', 'axes')->first();
        $subcategoryShields = $subcategories->where('name', 'shields')->first();
        $subcategoryHelmets = $subcategories->where('name', 'helmets')->first();

        for ($i = 0; $i < count($productsToSwords); $i++) {
            factory(Product::class)->create([
                'subcategory_id' => $subcategorySwords->id,
                'name' => $productsToSwords[$i],
                'path_to_thumbnail' => $swordsThumbnails[$i],
                'quantity' => 5
            ]);
        }

        for ($i = 0; $i < count($productsToAxes); $i++) {
            factory(Product::class)->create([
                'subcategory_id' => $subcategoryAxes->id,
                'name' => $productsToAxes[$i],
                'path_to_thumbnail' => $axesThumbnails[$i],
                'quantity' => 8
            ]);
        }

        for ($i = 0; $i < count($productsToShields); $i++) {
            factory(Product::class)->create([
                'subcategory_id' => $subcategoryShields->id,
                'name' => $productsToShields[$i],
                'path_to_thumbnail' => $shieldsThumbnails[$i],
                'quantity' => 14
            ]);
        }

        for ($i = 0; $i < count($productsToHelmets); $i++) {
            factory(Product::class)->create([
                'subcategory_id' => $subcategoryHelmets->id,
                'name' => $productsToHelmets[$i],
                'path_to_thumbnail' => $helmetsThumbnails[$i],
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
//            factory(Product::class, 2)->create([
//                'subcategory_id' => $subcategory->id,
//                'recommended' => true
//            ]);
//        }
    }
}
