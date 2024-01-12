<?php

namespace App\Repositories;

use App\Models\Attribute;
use App\Models\AttributeValue;

class AttributeRepository
{
    /* -------------------------------------------------------------------------- */
    /*                                 Attributes                                 */
    /* -------------------------------------------------------------------------- */
    public function getAllAttributes()
    {
        return Attribute::all();
    }

    public function createAttribute(array $data)
    {
        return Attribute::create($data);
    }

    public function updateAttribute($id, array $data)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->update($data);

        return $attribute;
    }

    public function deleteAttribute($id)
    {
        $attribute = Attribute::findOrFail($id);

        return $attribute->delete();
    }

    /* -------------------------------------------------------------------------- */
    /*                              Attribute Values                              */
    /* -------------------------------------------------------------------------- */
    public function getAllAttributeValues()
    {
        return AttributeValue::all();
    }

    public function createAttributeValue(array $data)
    {
        return AttributeValue::create($data);
    }

    public function updateAttributeValue($id, array $data)
    {
        $attributeValue = AttributeValue::findOrFail($id);
        $attributeValue->update($data);

        return $attributeValue;
    }

    public function deleteAttributeValue($id)
    {
        $attributeValue = AttributeValue::findOrFail($id);

        return $attributeValue->delete();
    }
}
