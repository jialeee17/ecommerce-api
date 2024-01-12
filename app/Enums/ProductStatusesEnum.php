<?php

namespace App\Enums;

enum ProductStatusesEnum: string
{
    case ACTIVE = 'active'; // Products that are live on the website and available for purchase.
    case INACTIVE = 'inactive'; // Products that are not currently visible on the website but are still stored in the system. This status might be useful for seasonal items.
    case DRAFT = 'draft'; // Products that are being created or edited but are not yet ready to be published live on the website.
    case OUT_OF_STOCK = 'out of stock'; // Products that are not currently available for purchase because the inventory has been depleted.
    case BACKORDER = 'backorder'; //  Products that are temporarily out of stock, but customers can still place orders, and the product will be shipped once it is back in stock.
    case DISCONTINUED = 'discontinued'; // Products that are no longer available for purchase because they have been discontinued.
    case COMING_SOON = 'coming soon'; // Products that will be available for purchase in the near future, generating anticipation and interest.
    case SOLD_OUT = 'sold out'; // Similar to "Out of Stock," but explicitly indicates that all available units have been sold.
    case RESERVED = 'reserved'; // Products that are set aside for a specific customer or purpose, preventing others from purchasing them.

    public function label(): string
    {
        return match ($this) {
            static::ACTIVE => 'Active',
            static::INACTIVE => 'Inactive',
            static::DRAFT => 'Draft',
            static::OUT_OF_STOCK => 'Out of Stock',
            static::BACKORDER => 'Backorder',
            static::DISCONTINUED => 'Discontinued',
            static::COMING_SOON => 'Coming Soon',
            static::SOLD_OUT => 'Sold Out',
            static::RESERVED => 'Reserved',
        };
    }
}