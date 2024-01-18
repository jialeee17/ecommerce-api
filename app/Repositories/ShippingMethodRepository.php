<?php

namespace App\Repositories;

use App\Models\ShippingMethod;

class ShippingMethodRepository
{
    public function getAllShippingMethods()
    {
        return ShippingMethod::all();
    }

    public function createShippingMethod(array $data)
    {
        return ShippingMethod::create($data);
    }

    public function updateShippingMethod($id, array $data)
    {
        $shippingMethod = ShippingMethod::findOrFail($id);
        $shippingMethod->update($data);

        return $shippingMethod;
    }

    public function deleteShippingMethod($id)
    {
        $shippingMethod = ShippingMethod::findOrFail($id);

        return $shippingMethod->delete();
    }
}
