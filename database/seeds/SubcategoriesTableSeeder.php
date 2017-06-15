<?php

use App\Category;
use App\Subcategory;
use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategoryNamesToAttack = ['swords', 'daggers'];
        $subcategoryNamesToDefend = ['armors', 'helmets', 'shields'];

        $categories = Category::all();

        $categoryToAttack = $categories->where('name', 'To Attack')->first();
        $categoryToDefend = $categories->where('name', 'To Defend')->first();

        for ($i = 0; $i < count($subcategoryNamesToAttack); $i++) {
            factory(Subcategory::class)->create([
                'name' => $subcategoryNamesToAttack[$i],
                'category_id' => $categoryToAttack->id
            ]);
        }

        for ($i = 0; $i < count($subcategoryNamesToDefend); $i++) {
            factory(Subcategory::class)->create([
                'name' => $subcategoryNamesToDefend[$i],
                'category_id' => $categoryToDefend->id
            ]);
        }
    }
}
