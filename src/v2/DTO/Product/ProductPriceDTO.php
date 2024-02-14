<?php

namespace Zendrop\ClickFunnelsApiClient\DTO\Product;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class ProductPriceDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $amount,
        public readonly string $currency,
        public readonly int $duration,
        public readonly string $interval,
        public readonly string $interval_count,

        mixed ...$data,
    ) {
        unset($data);
    }
}
