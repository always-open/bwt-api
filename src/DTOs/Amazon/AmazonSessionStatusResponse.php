<?php

namespace AlwaysOpen\BwtApi\DTOs\Amazon;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class AmazonSessionStatusResponse extends Data
{
    public function __construct(
        public readonly int $status,
        public readonly string $message,
        #[WithCast(DateTimeInterfaceCast::class, format: ['Y-m-d H:i:s', 'Y-m-d\TH:i:s\+H:i', 'Y-m-d H:i:s.u'])]
        public readonly ?Carbon $created_at,
        #[WithCast(DateTimeInterfaceCast::class, format: ['Y-m-d H:i:s', 'Y-m-d\TH:i:s\+H:i', 'Y-m-d H:i:s.u'])]
        public readonly ?Carbon $finished_at,
    ) {}
}
