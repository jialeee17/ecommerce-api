<?php

namespace App\Repositories;

use App\Models\Address;

class AddressRepository
{
    public function getAllAddresses()
    {
        return Address::all();
    }

    public function createAddress(array $data)
    {
        return Address::create($data);
    }

    public function updateAddress($id, array $data)
    {
        $address = Address::findOrFail($id);
        $address->update($data);

        return $address;
    }

    public function deleteAddress($id)
    {
        $address = Address::findOrFail($id);

        return $address->delete();
    }
}
