<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Order;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductPrice\ProductPriceDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductVariant\ProductVariantDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\ProductDTO;

class LineItemDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly int $order_id,
        public readonly ProductDTO $original_product,
        public readonly ProductPriceDTO $products_price,
        public readonly string $public_id = null,
        public readonly ?int $quantity = null,
        public readonly ?string $prorated = null,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null,
        public readonly ?ProductVariantDTO $products_variant = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
