<?php

use App\Payment;
use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentMethodsNames = ['Credit card', 'Usual transfer'];
        $paymentMethodsImages = ['/images/icons/credit_card.png', '/images/icons/usual_transfer.png'];

        for ($i = 0; $i < count($paymentMethodsNames); $i++) {
            factory(Payment::class)->create([
                'name' => $paymentMethodsNames[$i],
                'path_to_image' => $paymentMethodsImages[$i]
            ]);
        }
    }
}
