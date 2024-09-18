<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Address;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeeder::class,
            RolesPermissionsSeeder::class,
            CompanySeeder::class,
            CategorySeeder::class,
            CourseSeeder::class
        ]);

        \App\Models\User::factory(20)->create();

        Address::factory(20)->create();

    }
}
