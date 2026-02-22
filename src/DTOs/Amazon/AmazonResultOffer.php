<?php

namespace AlwaysOpen\BwtApi\DTOs\Amazon;

use Spatie\LaravelData\Data;

class AmazonResultOffer extends Data
{
    public function __construct(
        public readonly ?string $storefront,
        public readonly null|string|int $merchant_id,
        public readonly ?string $store_front_url,
        public readonly ?string $condition,
        public readonly null|float|string $price,
        public readonly null|float|string $sale_price,
        public readonly null|float|string $price_per_count,
        public readonly ?string $unit_type,
        public readonly ?string $ships_from,
        public readonly ?string $no_price_reason,
        public readonly ?string $delivery_info,
        public readonly null|string|float $rating,
        public readonly null|string|int $reviews,
        public readonly null|string|int $offer_rank,
        public readonly ?bool $is_buy_box_offer,
        public readonly null|string|int $inventory,
        public readonly ?string $inventory_message,
    ) {}
}
