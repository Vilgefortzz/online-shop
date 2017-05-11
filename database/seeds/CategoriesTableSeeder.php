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
        $categoryNames = ['To Attack', 'To Defend'];
        $pathToImages = ['/images/icons/attack_category.png', '/images/icons/defend_category.png'];

        for ($i = 0; $i < count($categoryNames); $i++) {
            factory(Category::class)->create([
                'name' => $categoryNames[$i],
                'path_to_image' => $pathToImages[$i]
            ]);
        }
    }
}
