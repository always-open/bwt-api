<?php

namespace AlwaysOpen\BwtApi\DTOs\Amazon;

use AlwaysOpen\BwtApi\Enums\ScrapingModes;
use Spatie\LaravelData\Data;

class ProductRequestItem extends Data
{
    public function __construct(
        public readonly string $requested_asin,
        public readonly string $region,
        public readonly string $postal_code = '00000',
        public readonly int $scraping_mode = ScrapingModes::INVENTORY->value,
        public readonly ?int $max_offer_pages = null,
    ) {}
}
