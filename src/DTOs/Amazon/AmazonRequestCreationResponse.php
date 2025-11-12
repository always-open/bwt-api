<?php

namespace AlwaysOpen\BwtApi\DTOs\Amazon;

use Spatie\LaravelData\Data;

class AmazonRequestCreationResponse extends Data
{
    public function __construct(
        public readonly int $id,
    ) {}
}
