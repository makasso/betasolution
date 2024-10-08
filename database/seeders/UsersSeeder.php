<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $demoUser = User::create([
            'name'              => 'Loïc Eti',
            'email'             => 'elmakasso@gmail.com',
            'password'          => Hash::make('dany1506'),
            'email_verified_at' => now(),
        ]);

        $demoUser2 = User::create([
            'name'              => 'Rodrigue Okala',
            'email'             => 'admin@demo.com',
            'password'          => Hash::make('demo'),
            'email_verified_at' => now(),
        ]);

        \App\Models\User::factory(20)->create();
    }
}
