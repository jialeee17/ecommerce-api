<?php

namespace App\Repositories;

use App\Models\ShippingClass;

class ShippingClassRepository
{
    public function getAllShippingClasses()
    {
        return ShippingClass::all();
    }

    public function createShippingClass(array $data)
    {
        return ShippingClass::create($data);
    }

    public function updateShippingClass($id, array $data)
    {
        $shippingClass = ShippingClass::findOrFail($id);
        $shippingClass->update($data);

        return $shippingClass;
    }

    public function deleteShippingClass($id)
    {
        $shippingClass = ShippingClass::findOrFail($id);

        return $shippingClass->delete();
    }
}
