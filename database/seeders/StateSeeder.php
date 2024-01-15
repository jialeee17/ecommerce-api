<?php

namespace Database\Seeders;

use App\Enums\StatesEnum;
use App\Enums\CountriesEnum;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countriesAndStates = $this->getStates();

        foreach ($countriesAndStates as $country => $states) {
            $country = Country::firstOrCreate([
                'name' => $country
            ]);

            foreach ($states as $state) {
                State::firstOrCreate(
                    ['name' => $state, 'country_id' => $country->id],
                );
            }
        }
    }

    private function getStates(): array
    {
        return [
            CountriesEnum::MALAYSIA->value => [
                StatesEnum::JOHOR->label(),
                StatesEnum::KEDAH->label(),
                StatesEnum::KELANTAN->label(),
                StatesEnum::MALACCA->label(),
                StatesEnum::NEGERI_SEMBILAN->label(),
                StatesEnum::PAHANG->label(),
                StatesEnum::PENANG->label(),
                StatesEnum::PERAK->label(),
                StatesEnum::PERLIS->label(),
                StatesEnum::SABAH->label(),
                StatesEnum::SARAWAK->label(),
                StatesEnum::SELANGOR->label(),
                StatesEnum::TERENGGANU->label(),
                StatesEnum::KUALA_LUMPUR->label(),
                StatesEnum::LABUAN->label(),
                StatesEnum::PUTRAJAYA->label(),
            ]
        ];
    }
}
