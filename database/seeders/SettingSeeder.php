<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\SettingCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoriesAndSettings = $this->getCategoriesAndSettings();

        foreach ($categoriesAndSettings as $category => $settings) {
            $settingCategory = SettingCategory::firstOrCreate([
                'name' => $category
            ]);

            foreach ($settings as $setting) {
                Setting::firstOrCreate(
                    ['name' => $setting['name'], 'setting_category_id' => $settingCategory->id],
                    ['value' => $setting['value'], 'description' => $setting['description']]
                );
            }
        }
    }

    private function getCategoriesAndSettings(): array
    {
        return [
            'general' => [
                // Store Address
                [
                    'name' => 'Address line 1',
                    'value' => null,
                    'description' => 'The street address for your business location.',
                ],
                [
                    'name' => 'Address line 2',
                    'value' => null,
                    'description' => 'An additional, optional address line for your business location.',
                ],
                [
                    'name' => 'City',
                    'value' => null,
                    'description' => 'The city in which your business is located.',
                ],
                [
                    'name' => 'Country / State',
                    'value' => null,
                    'description' => 'The country and state or province, if any, in which your business is located.',
                ],
                [
                    'name' => 'Postcode',
                    'value' => null,
                    'description' => 'The postal code, if any, in which your business is located.',
                ],

                // Currency options
                [
                    'name' => 'Currency',
                    'value' => null,
                    'description' => 'This controls what currency prices are listed at in the catalog and which currency gateways will take payments in.',
                ],
                [
                    'name' => 'Thousand separator',
                    'value' => ',',
                    'description' => 'This sets the thousand separator of displayed prices.',
                ],
                [
                    'name' => 'Decimal separator',
                    'value' => '.',
                    'description' => 'This sets the decimal separator of displayed prices.',
                ],
                [
                    'name' => 'Decimal separator',
                    'value' => '2',
                    'description' => 'This sets the number of decimal points shown in displayed prices.',
                ],
            ],

            'products' => [
                // Measurements
                [
                    'name' => 'Weight unit',
                    'value' => 'kg',
                    'description' => 'This controls what unit you will define weights in.',
                ],
                [
                    'name' => 'Dimensions unit',
                    'value' => 'cm',
                    'description' => 'This controls what unit you will define lengths in.',
                ],

                // Reviews
                [
                    'name' => 'Enable product reviews',
                    'value' => true,
                    'description' => null,
                ],
                [
                    'name' => 'Show "verified owner" label on customer reviews',
                    'value' => false,
                    'description' => null,
                ],
                [
                    'name' => 'Enable star rating on reviews',
                    'value' => false,
                    'description' => null,
                ],
                [
                    'name' => 'Require star ratings',
                    'value' => false,
                    'description' => 'Star ratings should be required, not optional',
                ],
            ],

            'emails' => [
                // Email sender options
                [
                    'name' => '"From" name',
                    'value' => env('APP_NAME'),
                    'description' => 'How the sender name appears in outgoing emails.',
                ],
                [
                    'name' => '"From" address',
                    'value' => null,
                    'description' => 'How the sender email appears in outgoing emails.',
                ],
            ],
        ];
    }
}
