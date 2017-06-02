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

        /*
         * Create admin
         */
        factory(User::class)->create([

            'username' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'admin' => true

        ]);

        factory(User::class)->create([

            'username' => 'vilgefortzz',
            'email' => 'greghause123@gmail.com',
            'password' => bcrypt('witampana')

        ]);

        factory(User::class, 20)->create();
    }
}
