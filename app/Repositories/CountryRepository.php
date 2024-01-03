<?php

namespace App\Repositories;

use App\Models\Country;
use App\Interfaces\CountryRepositoryInterface;

class CountryRepository implements CountryRepositoryInterface
{
    public function getAllCountries()
    {
        return Country::all();
    }

    public function createCountry(array $data)
    {
        return Country::create($data);
    }

    public function updateCountry($id, array $data)
    {
        return Country::findOrFail($id)->update($data);
    }

    public function deleteCountry($id)
    {
        $country = Country::findOrFail($id);

        return $country->delete();
    }
}
