<?php

namespace App\Repositories;

use App\Models\ShippingAddress;

class ShippingAddressRepository
{
    public function getAllShippingAddresses()
    {
        return ShippingAddress::all();
    }

    public function createShippingAddress(array $data)
    {
        return ShippingAddress::create($data);
    }

    public function updateShippingAddress($id, array $data)
    {
        $shippingAddress = ShippingAddress::findOrFail($id);
        $shippingAddress->update($data);

        return $shippingAddress;
    }

    public function deleteShippingAddress($id)
    {
        $shippingAddress = ShippingAddress::findOrFail($id);

        return $shippingAddress->delete();
    }
}
