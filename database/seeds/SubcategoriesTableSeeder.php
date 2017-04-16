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
        $subcategoryNamesToFight = ['swords', 'axes', 'katans'];
        $subcategoryNamesToDefend = ['armours', 'helmets', 'shields'];

        $categories = Category::all();

        $categoryToFight = $categories->where('name', 'To Fight')->first();
        $categoryToDefend = $categories->where('name', 'To Defend')->first();

        for ($i = 0; $i < count($subcategoryNamesToFight); $i++) {
            factory(Subcategory::class)->create([
                'name' => $subcategoryNamesToFight[$i],
                'category_id' => $categoryToFight->id
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
