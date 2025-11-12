<?php

namespace AlwaysOpen\BwtApi\DTOs\Amazon;

use Spatie\LaravelData\Data;

class AmazonResults extends Data
{
    public function __construct(
        public readonly array|null $items,
        public readonly int|null $limit,
        public readonly int|null $offset,
        public readonly int|null $total,
        public readonly int|null $status_code,
        public readonly string|null $detail,
        public readonly array|null $extra,
    ) {}
}
