<?php

namespace Database\Seeders;

use App\Enums\ShippingMethodsEnum;
use App\Models\ShippingMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shippingMethods = $this->getShippingMethods();

        foreach ($shippingMethods as $method) {
            ShippingMethod::updateOrCreate(
                ['slug' => $method['slug']],
                ['name' => $method['name'], 'description' => $method['description']]
            );
        }
    }

    private function getShippingMethods(): array
    {
        return [
            [
                // https://woo.com/document/free-shipping/
                'name' => ShippingMethodsEnum::FREE_SHIPPING->label(),
                'slug' => 'free-shipping',
                'description' => 'Free shipping is a great way to encourage customers to spend more. For example, offer free shipping on orders over $100.',
            ],
            [
                // https://woo.com/document/flat-rate-shipping/
                'name' => ShippingMethodsEnum::FLAT_RATE->label(),
                'slug' => 'flat-rate',
                'description' => 'Flat Rate Shipping is a shipping method that allows you to define a standard rate per item, per shipping class, or per order.',
            ],
            [
                // https://woo.com/document/local-pickup/
                'name' => ShippingMethodsEnum::LOCAL_PICKUP->label(),
                'slug' => 'local-pickup',
                'description' => 'Local Pickup is a shipping method that allows the customer to pick up the order themselves.',
            ],
        ];
    }
}
