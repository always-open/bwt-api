<?php

namespace AlwaysOpen\BwtApi\DTOs\Amazon;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class AmazonResult extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly int $scraping_mode,
        public readonly string $requested_asin,
        public readonly string|int|null $max_offers,
        public readonly string|int|null $max_offers_pages,
        public readonly string $postal_code,
        public readonly string $region,
        public readonly string $title,
        public readonly string $url,
        public readonly string $scraped_asin,
        public readonly string $description,
        public readonly array $additional_details,
        public readonly array $additional_information,
        public readonly array $additional_technical_details,
        public readonly string $manufacturer,
        public readonly array $best_sellers_rank,
        public readonly array $category,
        public readonly string|int|null $variations,
        public readonly string|int|null $past_month_sales,
        public readonly array $images,
        public readonly string $storefront,
        public readonly ?string $merchant_id,
        public readonly ?string $storefront_url,
        public readonly string $stock,
        public readonly string $condition,
        public readonly string|int|float|null $price,
        public readonly string|int|float|null $sale_price,
        public readonly ?string $coupon,
        public readonly string|int|null $ships_from,
        public readonly string|int|null $deliver_info,
        public readonly string|int|float|null $rating,
        public readonly string|int|null $reviews,
        public readonly ?bool $is_not_available,
        public readonly ?bool $is_not_exist,
        public readonly ?bool $is_tbyb_available,
        public readonly ?bool $is_subscribe_save_available,
        public readonly ?bool $is_buy_box_suppressed,
        public readonly ?string $currency,
        /* @var AmazonResultOffer[] $offers */
        #[DataCollectionOf(AmazonResultOffer::class)]
        public readonly ?array $offers,
        #[WithCast(DateTimeInterfaceCast::class, format: ['Y-m-d H:i:s', 'Y-m-d\TH:i:s\+H:i', 'Y-m-d H:i:s.u'])]
        public readonly ?Carbon $collected_at,
        public readonly ?string $exception,
    ) {}
}
