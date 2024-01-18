<?php

namespace App\Repositories;

use App\Models\PaymentMethod;

class PaymentMethodRepository
{
    public function getAllPaymentMethods()
    {
        return PaymentMethod::all();
    }

    public function createPaymentMethod(array $data)
    {
        return PaymentMethod::create($data);
    }

    public function updatePaymentMethod($id, array $data)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->update($data);

        return $paymentMethod;
    }

    public function deletePaymentMethod($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);

        return $paymentMethod->delete();
    }
}
