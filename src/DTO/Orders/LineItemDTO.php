<?php

namespace Zendrop\ClickFunnelsApiClient\DTO\Orders;

use Zendrop\ClickFunnelsApiClient\DTO\BaseDTO;
use Zendrop\ClickFunnelsApiClient\DTO\Products\ProductDTO;
use Zendrop\ClickFunnelsApiClient\DTO\Products\ProductPriceDTO;
use Zendrop\ClickFunnelsApiClient\DTO\Products\ProductVariantDTO;

class LineItemDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $public_id,
        public readonly int $order_id,
        public readonly ?int $quantity,
        public readonly ?string $prorated,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,

        public readonly ?ProductDTO $original_product,
        public readonly ?ProductPriceDTO $products_price,
        public readonly ?ProductVariantDTO $products_variant,

        mixed ...$data,
    ) {
        unset($data);
    }
}
