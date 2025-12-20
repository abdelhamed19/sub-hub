<?php

namespace App\Services;

use App\Models\Country;
use Illuminate\Support\Facades\Cache;

class LocationService
{
    public function getCountriesList()
    {
        $countries = Cache::rememberForever('countries_list', function () {
            return Country::select('id', 'code', 'name', 'flag')->get();
        });
        return $countries;
    }
}
