<?php

namespace AlwaysOpen\BwtApi\DTOs;

use AlwaysOpen\BwtApi\DTOs\Amazon\ProductRequestItem;
use Spatie\LaravelData\Data;

class BatchRequest extends Data
{
    public function __construct(
        public array $products,
    ) {}

    public function addProductToRequest(ProductRequestItem $productRequestItem): self
    {
        $this->products[] = $productRequestItem;

        return $this;
    }
}
