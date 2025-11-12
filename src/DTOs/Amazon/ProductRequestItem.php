<?php

namespace AlwaysOpen\BwtApi\DTOs;

use Spatie\LaravelData\Data;

class ProductRequestItem extends Data
{
    public function __construct(
        public readonly string $requested_asin,
        public readonly string $region,
        public readonly string $postal_code,
        public readonly int $scraping_mode,
        public readonly null|int $max_offer_pages = null,
    ) {}
}
