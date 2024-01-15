<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Enums\CountriesEnum;
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
            ['country_code', 'currency', 'flag_path']
        );
    }

    private function getCountries(): array
    {
        // * Country Code List: https://countrycode.org/
        // * Currency Code List: https://www.iban.com/currency-codes
        // * Country Flag: https://www.flaticon.com/search?word=malaysia
        return [
            [
                'name' => CountriesEnum::AFGHANISTAN->value,
                'country_code' => 'AF',
                'currency' => 'AFN',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::ALBANIA->value,
                'country_code' => 'AL',
                'currency' => 'ALL',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::ALGERIA->value,
                'country_code' => 'DZ',
                'currency' => 'DZD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::AMERICAN_SAMOA->value,
                'country_code' => 'AS',
                'currency' => 'USD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::ANDORRA->value,
                'country_code' => 'AD',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::ANGOLA->value,
                'country_code' => 'AO',
                'currency' => 'AOA',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::ANGUILLA->value,
                'country_code' => 'AI',
                'currency' => 'XCD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::ANTARCTICA->value,
                'country_code' => 'AQ',
                'currency' => null, // No universal currency
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::ANTIGUA_AND_BARBUDA->value,
                'country_code' => 'AG',
                'currency' => 'XCD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::ARGENTINA->value,
                'country_code' => 'AR',
                'currency' => 'ARS',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::ARMENIA->value,
                'country_code' => 'AM',
                'currency' => 'AMD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::ARUBA->value,
                'country_code' => 'AW',
                'currency' => 'AWG',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::AUSTRALIA->value,
                'country_code' => 'AU',
                'currency' => 'AUD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::AUSTRIA->value,
                'country_code' => 'AT',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::AZERBAIJAN->value,
                'country_code' => 'AZ',
                'currency' => 'AZN',
                'flag_path' => null,
            ],

            // B...
            [
                'name' => CountriesEnum::BAHAMAS->value,
                'country_code' => 'BS',
                'currency' => 'BSD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::BAHRAIN->value,
                'country_code' => 'BH',
                'currency' => 'BHD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::BANGLADESH->value,
                'country_code' => 'BD',
                'currency' => 'BDT',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::BARBADOS->value,
                'country_code' => 'BB',
                'currency' => 'BBD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::BELARUS->value,
                'country_code' => 'BY',
                'currency' => 'BYN',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::BELGIUM->value,
                'country_code' => 'BE',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::BELIZE->value,
                'country_code' => 'BZ',
                'currency' => 'BZD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::BENIN->value,
                'country_code' => 'BJ',
                'currency' => 'XOF',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::BERMUDA->value,
                'country_code' => 'BM',
                'currency' => 'BMD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::BHUTAN->value,
                'country_code' => 'BT',
                'currency' => 'BTN',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::BOLIVIA->value,
                'country_code' => 'BO',
                'currency' => 'BOB',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::BOSNIA_AND_HERZEGOVINA->value,
                'country_code' => 'BA',
                'currency' => 'BAM',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::BOTSWANA->value,
                'country_code' => 'BW',
                'currency' => 'BWP',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::BRAZIL->value,
                'country_code' => 'BR',
                'currency' => 'BRL',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::BRITISH_INDIAN_OCEAN_TERRITORY->value,
                'country_code' => 'IO',
                'currency' => 'USD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::BRITISH_VIRGIN_ISLANDS->value,
                'country_code' => 'VG',
                'currency' => 'USD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::BRUNEI->value,
                'country_code' => 'BN',
                'currency' => 'BND',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::BULGARIA->value,
                'country_code' => 'BG',
                'currency' => 'BGN',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::BURKINA_FASO->value,
                'country_code' => 'BF',
                'currency' => 'XOF',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::BURUNDI->value,
                'country_code' => 'BI',
                'currency' => 'BIF',
                'flag_path' => null,
            ],

            // C...
            [
                'name' => CountriesEnum::CAMBODIA->value,
                'country_code' => 'KH',
                'currency' => 'KHR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::CAMEROON->value,
                'country_code' => 'CM',
                'currency' => 'XAF',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::CANADA->value,
                'country_code' => 'CA',
                'currency' => 'CAD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::CAPE_VERDE->value,
                'country_code' => 'CV',
                'currency' => 'CVE',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::CAYMAN_ISLANDS->value,
                'country_code' => 'KY',
                'currency' => 'KYD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::CENTRAL_AFRICAN_REPUBLIC->value,
                'country_code' => 'CF',
                'currency' => 'XAF',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::CHAD->value,
                'country_code' => 'TD',
                'currency' => 'XAF',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::CHILE->value,
                'country_code' => 'CL',
                'currency' => 'CLF',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::CHINA->value,
                'country_code' => 'CN',
                'currency' => 'CNY',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::CHRISTMAS_ISLAND->value,
                'country_code' => 'CX',
                'currency' => 'AUD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::COCOS_ISLANDS->value,
                'country_code' => 'CC',
                'currency' => 'AUD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::COLOMBIA->value,
                'country_code' => 'CO',
                'currency' => 'COP',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::COMOROS->value,
                'country_code' => 'KM',
                'currency' => 'KMF',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::COOK_ISLANDS->value,
                'country_code' => 'CK',
                'currency' => 'NZD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::COSTA_RICA->value,
                'country_code' => 'CR',
                'currency' => 'CRC',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::CROATIA->value,
                'country_code' => 'HR',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::CUBA->value,
                'country_code' => 'CU',
                'currency' => 'CUP',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::CURACAO->value,
                'country_code' => 'CW',
                'currency' => 'ANG',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::CYPRUS->value,
                'country_code' => 'CY',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::CZECH_REPUBLIC->value,
                'country_code' => 'CZ',
                'currency' => 'CZK',
                'flag_path' => null,
            ],

            // D...
            [
                'name' => CountriesEnum::DEMOCRATIC_REPUBLIC_OF_THE_CONGO->value,
                'country_code' => 'CD',
                'currency' => 'CDF',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::DENMARK->value,
                'country_code' => 'DK',
                'currency' => 'DKK',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::DJIBOUTI->value,
                'country_code' => 'DJ',
                'currency' => 'DJF',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::DOMINICA->value,
                'country_code' => 'DM',
                'currency' => 'XCD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::DOMINICAN_REPUBLIC->value,
                'country_code' => 'DO',
                'currency' => 'DOP',
                'flag_path' => null,
            ],

            // E...
            [
                'name' => CountriesEnum::TIMOR_LESTE->value,
                'country_code' => 'TL',
                'currency' => 'USD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::ECUADOR->value,
                'country_code' => 'EC',
                'currency' => 'USD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::EGYPT->value,
                'country_code' => 'EG',
                'currency' => 'EGP',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::EL_SALVADOR->value,
                'country_code' => 'SV',
                'currency' => 'USD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::EQUATORIAL_GUINEA->value,
                'country_code' => 'GQ',
                'currency' => 'XAF',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::ERITREA->value,
                'country_code' => 'ER',
                'currency' => 'ERN',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::ESTONIA->value,
                'country_code' => 'EE',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::ETHIOPIA->value,
                'country_code' => 'ET',
                'currency' => 'ETB',
                'flag_path' => null,
            ],

            // F...
            [
                'name' => CountriesEnum::FALKLAND_ISLANDS->value,
                'country_code' => 'FK',
                'currency' => 'FKP',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::FAROE_ISLANDS->value,
                'country_code' => 'FO',
                'currency' => 'DKK',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::FIJI->value,
                'country_code' => 'FJ',
                'currency' => 'FJD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::FINLAND->value,
                'country_code' => 'FI',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::FRANCE->value,
                'country_code' => 'FR',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::FRENCH_POLYNESIA->value,
                'country_code' => 'PF',
                'currency' => 'XPF',
                'flag_path' => null,
            ],

            // G...
            [
                'name' => CountriesEnum::GABON->value,
                'country_code' => 'GA',
                'currency' => 'XAF',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::GAMBIA->value,
                'country_code' => 'GM',
                'currency' => 'GMD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::GEORGIA->value,
                'country_code' => 'GE',
                'currency' => 'GEL',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::GERMANY->value,
                'country_code' => 'DE',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::GHANA->value,
                'country_code' => 'GH',
                'currency' => 'GHS',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::GIBRALTAR->value,
                'country_code' => 'GI',
                'currency' => 'GIP',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::GREECE->value,
                'country_code' => 'GR',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::GREENLAND->value,
                'country_code' => 'GL',
                'currency' => 'DKK',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::GRENADA->value,
                'country_code' => 'GD',
                'currency' => 'XCD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::GUAM->value,
                'country_code' => 'GU',
                'currency' => 'USD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::GUATEMALA->value,
                'country_code' => 'GT',
                'currency' => 'GTQ',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::GUERNSEY->value,
                'country_code' => 'GG',
                'currency' => 'GBP',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::GUINEA->value,
                'country_code' => 'GN',
                'currency' => 'GNF',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::GUINEA_BISSAU->value,
                'country_code' => 'GW',
                'currency' => 'XOF',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::GUYANA->value,
                'country_code' => 'GY',
                'currency' => 'GYD',
                'flag_path' => null,
            ],

            // H...
            [
                'name' => CountriesEnum::HAITI->value,
                'country_code' => 'HT',
                'currency' => 'HTG',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::HONDURAS->value,
                'country_code' => 'HN',
                'currency' => 'HNL',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::HONG_KONG->value,
                'country_code' => 'HK',
                'currency' => 'HKD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::HUNGARY->value,
                'country_code' => 'HU',
                'currency' => 'HUF',
                'flag_path' => null,
            ],

            // I...
            [
                'name' => CountriesEnum::ICELAND->value,
                'country_code' => 'IS',
                'currency' => 'ISK',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::INDIA->value,
                'country_code' => 'IN',
                'currency' => 'INR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::INDONESIA->value,
                'country_code' => 'ID',
                'currency' => 'IDR',
                'flag_path' => 'ID.png',
            ],
            [
                'name' => CountriesEnum::IRAN->value,
                'country_code' => 'IR',
                'currency' => 'IRR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::IRAQ->value,
                'country_code' => 'IQ',
                'currency' => 'IQD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::IRELAND->value,
                'country_code' => 'IE',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::ISLE_OF_MAN->value,
                'country_code' => 'IM',
                'currency' => 'GBP',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::ISRAEL->value,
                'country_code' => 'IL',
                'currency' => 'ILS',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::ITALY->value,
                'country_code' => 'IT',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::IVORY_COAST->value,
                'country_code' => 'CI',
                'currency' => 'XOF',
                'flag_path' => null,
            ],

            // J...
            [
                'name' => CountriesEnum::JAMAICA->value,
                'country_code' => 'JM',
                'currency' => 'JMD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::JAPAN->value,
                'country_code' => 'JP',
                'currency' => 'JPY',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::JERSEY->value,
                'country_code' => 'JE',
                'currency' => 'GBP',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::JORDAN->value,
                'country_code' => 'JO',
                'currency' => 'JOD',
                'flag_path' => null,
            ],

            // K...
            [
                'name' => CountriesEnum::KAZAKHSTAN->value,
                'country_code' => 'KZ',
                'currency' => 'KZT',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::KENYA->value,
                'country_code' => 'KE',
                'currency' => 'KES',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::KIRIBATI->value,
                'country_code' => 'KI',
                'currency' => 'AUD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::KOSOVO->value,
                'country_code' => 'XK',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::KUWAIT->value,
                'country_code' => 'KW',
                'currency' => 'KWD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::KYRGYZSTAN->value,
                'country_code' => 'KG',
                'currency' => 'KGS',
                'flag_path' => null,
            ],

            // L...
            [
                'name' => CountriesEnum::LAOS->value,
                'country_code' => 'LA',
                'currency' => 'LAK',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::LATVIA->value,
                'country_code' => 'LV',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::LEBANON->value,
                'country_code' => 'LB',
                'currency' => 'LBP',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::LESOTHO->value,
                'country_code' => 'LS',
                'currency' => 'LSL',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::LIBERIA->value,
                'country_code' => 'LR',
                'currency' => 'LRD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::LIBYA->value,
                'country_code' => 'LY',
                'currency' => 'LYD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::LIECHTENSTEIN->value,
                'country_code' => 'LI',
                'currency' => 'CHF',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::LITHUANIA->value,
                'country_code' => 'LT',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::LUXEMBOURG->value,
                'country_code' => 'LU',
                'currency' => 'EUR',
                'flag_path' => null,
            ],

            // M...
            [
                'name' => CountriesEnum::MACAU->value,
                'country_code' => 'MO',
                'currency' => 'MOP',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::MACEDONIA->value,
                'country_code' => 'MK',
                'currency' => 'MKD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::MADAGASCAR->value,
                'country_code' => 'MG',
                'currency' => 'MGA',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::MALAWI->value,
                'country_code' => 'MW',
                'currency' => 'MWK',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::MALAYSIA->value,
                'country_code' => 'MY',
                'currency' => 'MYR',
                'flag_path' => 'MY.png',
            ],
            [
                'name' => CountriesEnum::MALDIVES->value,
                'country_code' => 'MV',
                'currency' => 'MVR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::MALI->value,
                'country_code' => 'ML',
                'currency' => 'XOF',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::MALTA->value,
                'country_code' => 'MT',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::MARSHALL_ISLANDS->value,
                'country_code' => 'MH',
                'currency' => 'USD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::MAURITANIA->value,
                'country_code' => 'MR',
                'currency' => 'MRU',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::MAURITIUS->value,
                'country_code' => 'MU',
                'currency' => 'MUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::MAYOTTE->value,
                'country_code' => 'YT',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::MEXICO->value,
                'country_code' => 'MX',
                'currency' => 'MXN',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::MICRONESIA->value,
                'country_code' => 'FM',
                'currency' => 'USD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::MOLDOVA->value,
                'country_code' => 'MD',
                'currency' => 'MDL',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::MONACO->value,
                'country_code' => 'MX',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::MONGOLIA->value,
                'country_code' => 'MN',
                'currency' => 'MNT',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::MONTENEGRO->value,
                'country_code' => 'ME',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::MONTSERRAT->value,
                'country_code' => 'MS',
                'currency' => 'XCD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::MOROCCO->value,
                'country_code' => 'MA',
                'currency' => 'MAD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::MOZAMBIQUE->value,
                'country_code' => 'MZ',
                'currency' => 'MZN',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::MYANMAR->value,
                'country_code' => 'MM',
                'currency' => 'MMK',
                'flag_path' => null,
            ],

            // N...
            [
                'name' => CountriesEnum::NAMIBIA->value,
                'country_code' => 'NA',
                'currency' => 'NAD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::NAURU->value,
                'country_code' => 'NR',
                'currency' => 'AUD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::NEPAL->value,
                'country_code' => 'NP',
                'currency' => 'NPR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::NETHERLANDS->value,
                'country_code' => 'NL',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::NETHERLANDS_ANTILLES->value,
                'country_code' => 'AN',
                'currency' => 'ANG',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::NEW_CALEDONIA->value,
                'country_code' => 'NC',
                'currency' => 'XPF',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::NEW_ZEALAND->value,
                'country_code' => 'NZ',
                'currency' => 'NZD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::NICARAGUA->value,
                'country_code' => 'NI',
                'currency' => 'NIO',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::NIGER->value,
                'country_code' => 'NE',
                'currency' => 'XOF',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::NIGERIA->value,
                'country_code' => 'NG',
                'currency' => 'NGN',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::NIUE->value,
                'country_code' => 'NU',
                'currency' => 'NZD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::NORTH_KOREA->value,
                'country_code' => 'KP',
                'currency' => 'KPW',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::NORTHERN_MARIANA_ISLANDS->value,
                'country_code' => 'MP',
                'currency' => 'USD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::NORWAY->value,
                'country_code' => 'NO',
                'currency' => 'NOK',
                'flag_path' => null,
            ],

            // O...
            [
                'name' => CountriesEnum::OMAN->value,
                'country_code' => 'OM',
                'currency' => 'OMR',
                'flag_path' => null,
            ],

            // P...
            [
                'name' => CountriesEnum::PAKISTAN->value,
                'country_code' => 'PK',
                'currency' => 'PKR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::PALAU->value,
                'country_code' => 'PW',
                'currency' => 'USD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::PALESTINE->value,
                'country_code' => 'PS',
                'currency' => null, // No universal currency
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::PANAMA->value,
                'country_code' => 'PA',
                'currency' => 'PAB',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::PAPUA_NEW_GUINEA->value,
                'country_code' => 'PG',
                'currency' => 'PGK',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::PARAGUAY->value,
                'country_code' => 'PY',
                'currency' => 'PYG',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::PERU->value,
                'country_code' => 'PE',
                'currency' => 'PEN',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::PHILIPPINES->value,
                'country_code' => 'PH',
                'currency' => 'PHP',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::PITCAIRN->value,
                'country_code' => 'PN',
                'currency' => 'NZD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::POLAND->value,
                'country_code' => 'PL',
                'currency' => 'PLN',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::PORTUGAL->value,
                'country_code' => 'PT',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::PUERTO_RICO->value,
                'country_code' => 'PR',
                'currency' => 'USD',
                'flag_path' => null,
            ],

            // Q...
            [
                'name' => CountriesEnum::QATAR->value,
                'country_code' => 'QA',
                'currency' => 'QAR',
                'flag_path' => null,
            ],

            // R...
            [
                'name' => CountriesEnum::REPUBLIC_OF_THE_CONGO->value,
                'country_code' => 'CG',
                'currency' => 'XAF',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::REUNION->value,
                'country_code' => 'RE',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::ROMANIA->value,
                'country_code' => 'RO',
                'currency' => 'RON',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::RUSSIA->value,
                'country_code' => 'RU',
                'currency' => 'RUB',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::RWANDA->value,
                'country_code' => 'RW',
                'currency' => 'RWF',
                'flag_path' => null,
            ],

            // S...
            [
                'name' => CountriesEnum::SAINT_BARTHELEMY->value,
                'country_code' => 'BL',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SAINT_HELENA->value,
                'country_code' => 'SH',
                'currency' => 'SHP',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SAINT_KITTS_AND_NEVIS->value,
                'country_code' => 'KN',
                'currency' => 'XCD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SAINT_LUCIA->value,
                'country_code' => 'LC',
                'currency' => 'XCD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SAINT_MARTIN->value,
                'country_code' => 'MF',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SAINT_PIERRE_AND_MIQUELON->value,
                'country_code' => 'PM',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SAINT_VINCENT_AND_THE_GRENADINES->value,
                'country_code' => 'VC',
                'currency' => 'XCD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SAMOA->value,
                'country_code' => 'WS',
                'currency' => 'WST',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SAN_MARINO->value,
                'country_code' => 'SM',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SAO_TOME_AND_PRINCIPE->value,
                'country_code' => 'ST',
                'currency' => 'STN',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SAUDI_ARABIA->value,
                'country_code' => 'SA',
                'currency' => 'SAR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SENEGAL->value,
                'country_code' => 'SN',
                'currency' => 'XOF',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SERBIA->value,
                'country_code' => 'RS',
                'currency' => 'RSD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SEYCHELLES->value,
                'country_code' => 'SC',
                'currency' => 'SCR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SIERRA_LEONE->value,
                'country_code' => 'SL',
                'currency' => 'SLE',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SINGAPORE->value,
                'country_code' => 'SG',
                'currency' => 'SGD',
                'flag_path' => 'SG.png',
            ],
            [
                'name' => CountriesEnum::SINT_MAARTEN->value,
                'country_code' => 'SX',
                'currency' => 'ANG',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SLOVAKIA->value,
                'country_code' => 'SK',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SLOVENIA->value,
                'country_code' => 'SI',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SOLOMON_ISLANDS->value,
                'country_code' => 'SB',
                'currency' => 'SBD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SOMALIA->value,
                'country_code' => 'SO',
                'currency' => 'SOS',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SOUTH_AFRICA->value,
                'country_code' => 'ZA',
                'currency' => 'ZAR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SOUTH_KOREA->value,
                'country_code' => 'KR',
                'currency' => 'KRW',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SOUTH_SUDAN->value,
                'country_code' => 'SS',
                'currency' => 'SSP',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SPAIN->value,
                'country_code' => 'ES',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SRI_LANKA->value,
                'country_code' => 'LK',
                'currency' => 'LKR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SUDAN->value,
                'country_code' => 'SD',
                'currency' => 'SDG',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SURINAME->value,
                'country_code' => 'SR',
                'currency' => 'SRD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SVALBARD_AND_JAN_MAYEN->value,
                'country_code' => 'SJ',
                'currency' => 'NOK',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SWAZILAND->value,
                'country_code' => 'SZ',
                'currency' => 'SZL',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SWEDEN->value,
                'country_code' => 'SE',
                'currency' => 'SEK',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SWITZERLAND->value,
                'country_code' => 'CH',
                'currency' => 'CHE',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::SYRIA->value,
                'country_code' => 'SY',
                'currency' => 'SYP',
                'flag_path' => null,
            ],

            // T...
            [
                'name' => CountriesEnum::TAIWAN->value,
                'country_code' => 'TW',
                'currency' => 'TWD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::TAJIKISTAN->value,
                'country_code' => 'TJ',
                'currency' => 'TJS',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::TANZANIA->value,
                'country_code' => 'TZ',
                'currency' => 'TZS',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::THAILAND->value,
                'country_code' => 'TH',
                'currency' => 'THB',
                'flag_path' => 'TH.png',
            ],
            [
                'name' => CountriesEnum::TOGO->value,
                'country_code' => 'TG',
                'currency' => 'XOF',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::TOKELAU->value,
                'country_code' => 'TK',
                'currency' => 'NZD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::TONGA->value,
                'country_code' => 'TO',
                'currency' => 'TOP',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::TRINIDAD_AND_TOBAGO->value,
                'country_code' => 'TT',
                'currency' => 'TTD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::TUNISIA->value,
                'country_code' => 'TN',
                'currency' => 'TND',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::TURKEY->value,
                'country_code' => 'TR',
                'currency' => 'TRY',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::TURKMENISTAN->value,
                'country_code' => 'TM',
                'currency' => 'TMT',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::TURKS_AND_CAICOS_ISLANDS->value,
                'country_code' => 'TC',
                'currency' => 'USD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::TUVALU->value,
                'country_code' => 'TV',
                'currency' => 'AUD',
                'flag_path' => null,
            ],

            // U...
            [
                'name' => CountriesEnum::US_VIRGIN_ISLANDS->value,
                'country_code' => 'VI',
                'currency' => 'USD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::UGANDA->value,
                'country_code' => 'UG',
                'currency' => 'UGX',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::UKRAINE->value,
                'country_code' => 'UA',
                'currency' => 'UAH',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::UNITED_ARAB_EMIRATES->value,
                'country_code' => 'AE',
                'currency' => 'AED',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::UNITED_KINGDOM->value,
                'country_code' => 'GB',
                'currency' => 'GBP',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::UNITED_STATES->value,
                'country_code' => 'US',
                'currency' => 'USD',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::URUGUAY->value,
                'country_code' => 'UY',
                'currency' => 'UYU',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::UZBEKISTAN->value,
                'country_code' => 'UZ',
                'currency' => 'UZS',
                'flag_path' => null,
            ],

            // V...
            [
                'name' => CountriesEnum::VANUATU->value,
                'country_code' => 'VU',
                'currency' => 'VUV',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::VATICAN->value,
                'country_code' => 'VA',
                'currency' => 'EUR',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::VENEZUELA->value,
                'country_code' => 'VE',
                'currency' => 'VEF',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::VIETNAM->value,
                'country_code' => 'VN',
                'currency' => 'VND',
                'flag_path' => null,
            ],

            // W...
            [
                'name' => CountriesEnum::WALLIS_AND_FUTUNA->value,
                'country_code' => 'WF',
                'currency' => 'XPF',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::WESTERN_SAHARA->value,
                'country_code' => 'EH',
                'currency' => 'MAD',
                'flag_path' => null,
            ],

            // Y...
            [
                'name' => CountriesEnum::YEMEN->value,
                'country_code' => 'YE',
                'currency' => 'YER',
                'flag_path' => null,
            ],

            // Z...
            [
                'name' => CountriesEnum::ZAMBIA->value,
                'country_code' => 'ZM',
                'currency' => 'ZMW',
                'flag_path' => null,
            ],
            [
                'name' => CountriesEnum::ZIMBABWE->value,
                'country_code' => 'ZW',
                'currency' => 'ZWL',
                'flag_path' => null,
            ],
        ];
    }
}
