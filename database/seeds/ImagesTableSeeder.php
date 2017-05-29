<?php

use App\Image;
use App\Product;
use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();

        foreach ($products as $product) {

            // Gallery of images ( high resolutions )
            $productImagesHighRes = [
                '/images/galleries/'.$product->subcategory->name.'/'.$product->id.'/1.jpg',
                '/images/galleries/'.$product->subcategory->name.'/'.$product->id.'/2.jpg',
                '/images/galleries/'.$product->subcategory->name.'/'.$product->id.'/3.jpg'
            ];

            // Gallery of images ( low resolutions - thumbnails )
            $productImagesLowRes = [
                '/images/galleries/'.$product->subcategory->name.'/'.$product->id.'/1_tb.jpg',
                '/images/galleries/'.$product->subcategory->name.'/'.$product->id.'/2_tb.jpg',
                '/images/galleries/'.$product->subcategory->name.'/'.$product->id.'/3_tb.jpg'
            ];

            for ($i = 0; $i < count($productImagesHighRes); $i++) {

                $image = factory(Image::class)->create([
                    'path_to_image' => $productImagesHighRes[$i],
                    'path_to_thumbnail' => $productImagesLowRes[$i]
                ]);

                $product->images()->attach($image->id);
            }
        }
    }
}
