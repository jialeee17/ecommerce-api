<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Enums\PaymentMethodsEnum;
use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentMethods = $this->getPaymentMethods();

        foreach ($paymentMethods as $method) {
            PaymentMethod::updateOrCreate(
                ['name' => $method['name']],
                ['description' => $method['description']]
            );
        }

        PaymentMethod::whereNotIn('name', array_column($paymentMethods, 'name'))->delete();
    }

    private function getPaymentMethods(): array
    {
        return [
            [
                'name' => PaymentMethodsEnum::DIRECT_BANK_TRANSFER->label(),
                'description' => 'Take payments in person via BACS. More commonly known as direct bank/wire transfer.',
            ],
            [
                'name' => PaymentMethodsEnum::CHECK_PAYMENTS->label(),
                'description' => 'Take payments in person via checks. This offline gateway can also be useful to test purchases.',
            ],
            [
                'name' => PaymentMethodsEnum::CASH_ON_DELIVERY->label(),
                'description' => 'Have your customers pay with cash (or by other means) upon delivery.',
            ],
            // [
            //     'name' => PaymentMethodsEnum::PAYPAL->label(),
            //     'description' => 'PayPal Standard redirects customers to PayPal to enter their payment information.',
            // ],
        ];
    }
}
