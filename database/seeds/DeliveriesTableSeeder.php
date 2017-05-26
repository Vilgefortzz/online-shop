<?php

use App\Delivery;
use Illuminate\Database\Seeder;

class DeliveriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deliveryMethodsNames = ['InPost Courier', 'InPost paczkomat', 'UPS', 'Poczta Polska'];
        $deliveryMethodsPrices = [8, 7, 12, 6];
        $deliveryMethodsImages = ['/images/icons/inPost_courier.png', '/images/icons/inPost_paczkomat.jpg',
            '/images/icons/ups.png', '/images/icons/poczta_polska.jpg'];


        for ($i = 0; $i < count($deliveryMethodsNames); $i++) {
            factory(Delivery::class)->create([
                'name' => $deliveryMethodsNames[$i],
                'price' => $deliveryMethodsPrices[$i],
                'path_to_image' => $deliveryMethodsImages[$i]
            ]);
        }
    }
}
