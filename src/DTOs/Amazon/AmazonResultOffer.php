<?php

namespace AlwaysOpen\BwtApi\DTOs\Amazon;

use Spatie\LaravelData\Data;

class AmazonResultOffer extends Data
{
    public function __construct(
            public readonly string $storefront,
            public readonly null|string|int $merchant_id,
            public readonly null|string $store_front_url,
            public readonly null|string $condition,
            public readonly null|float|string $price,
            public readonly null|float|string $sale_price,
            public readonly null|float|string $price_per_count,
            public readonly null|string $unit_type,
            public readonly null|string $ships_from,
            public readonly null|string $no_price_reason,
            public readonly null|string $delivery_info,
            public readonly null|string|float $rating,
            public readonly null|string|int $reviews,
            public readonly null|string|int $offer_rank,
            public readonly null|bool $is_buy_box_offer,
            public readonly null|string|int $inventory,
            public readonly null|string $inventory_message,
    ) {}
}
