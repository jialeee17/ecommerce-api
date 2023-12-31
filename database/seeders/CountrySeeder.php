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
        $countries = $this->getCountries();

        Country::upsert(
            $countries,
            ['name'],
            ['country_code', 'currency', 'flag_url', 'timezone']
        );
    }

    private function getCountries()
    {
        // * Country Code List: https://countrycode.org/
        // * Currency Code List: https://www.iban.com/currency-codes
        // * Country Flag: https://www.flaticon.com/search?word=malaysia
        return [
            [
                'name' => 'Indonesia',
                'country_code' => 'ID',
                'currency' => 'IDR',
                'flag_url' => 'ID.png',
                'timezone' => 'GMT+7',
            ],
            [
                'name' => 'Malaysia',
                'country_code' => 'MY',
                'currency' => 'MYR',
                'flag_url' => 'MY.png',
                'timezone' => 'GMT+8',
            ],
            [
                'name' => 'Singapore',
                'country_code' => 'SG',
                'currency' => 'SGD',
                'flag_url' => 'SG.png',
                'timezone' => 'GMT+8',
            ],
            [
                'name' => 'Thailand',
                'country_code' => 'TH',
                'currency' => 'THB',
                'flag_url' => 'TH.png',
                'timezone' => 'GMT+7',
            ],
        ];
    }
}
