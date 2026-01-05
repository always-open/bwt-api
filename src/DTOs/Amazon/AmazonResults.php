<?php

namespace AlwaysOpen\BwtApi\DTOs\Amazon;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

class AmazonResults extends Data
{
    public function __construct(
        #[DataCollectionOf(AmazonResult::class)]
        public readonly ?array $items,
        public readonly ?int $limit,
        public readonly ?int $offset,
        public readonly ?int $total,
        public readonly ?int $status_code,
        public readonly ?string $detail,
        public readonly ?array $extra,
    ) {}
}
