<?php

namespace App\Repositories;

use App\Models\ShippingZone;

class ShippingZoneRepository
{
    public function getAllShippingZones()
    {
        return ShippingZone::all();
    }

    public function createShippingZone(array $data)
    {
        return ShippingZone::create($data);
    }

    public function updateShippingZone($id, array $data)
    {
        $shippingZone = ShippingZone::findOrFail($id);
        $shippingZone->update($data);

        return $shippingZone;
    }

    public function deleteShippingZone($id)
    {
        $shippingZone = ShippingZone::findOrFail($id);

        return $shippingZone->delete();
    }
}
