<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $industriesEn = json_decode(file_get_contents( public_path('json/industries.json')), true)['en'];
        $industriesFr = json_decode(file_get_contents( public_path('json/industries.json')), true)['fr'];

        foreach ($industriesEn as $iEn) {
            Industry::create([
                'name_en' => $iEn,
            ]);
        }

        $industries = Industry::all();

        foreach ($industries as $key => $industry) {
            $industry->name_fr = $industriesFr[$key];
            $industry->save();
        }
    }
}
