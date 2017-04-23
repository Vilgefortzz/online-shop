<?php

use App\Cart;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(User::class)->create([

            'name' => 'grzesiek',
            'email' => 'greghause123@gmail.com',
            'password' => bcrypt('witampana')

        ]);

        factory(User::class, 20)->create();
    }
}
