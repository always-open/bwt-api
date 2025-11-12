<?php

namespace AlwaysOpen\BwtApi\Enums;

enum ScrapingModes: int
{
    case OFFERS = 1;
    case INVENTORY = 2;
    case LISTINGS = 3;
    case LISTING_OFFERS = 4;
    case PRODUCT_INVENTORY = 5;
}
