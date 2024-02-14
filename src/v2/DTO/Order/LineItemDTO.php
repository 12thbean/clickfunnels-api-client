<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Order;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;
use Zendrop\ClickFunnelsApiClient\DTO\Product\ProductPriceDTO;
use Zendrop\ClickFunnelsApiClient\DTO\Product\ProductVariantDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\ProductDTO;

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
