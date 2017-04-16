<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryNames = ['To Fight', 'To Defend'];

        $categories = [];

        for ($i = 0; $i < count($categoryNames); $i++) {
            $categories[] = factory(Category::class)->create([
                'name' => $categoryNames[$i]
            ]);
        }
    }
}
