<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SubcategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        //$this->call(ReviewsTableSeeder::class);
        $this->call(DeliveriesTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
    }
}
