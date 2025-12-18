<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(database_path('countries.json'));
        $countries = json_decode($json, true);
        foreach ($countries as $country) {
            Country::create([
                'name' => $country['name'],
                'code' => $country['countrycode'],
                'flag' => $country['flag'] ?? null,
            ]);
        }
    }
}
