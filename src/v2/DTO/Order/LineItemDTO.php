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
        public readonly int $orderId,
        public readonly ProductDTO $originalProduct,
        public readonly ProductPriceDTO $productsPrice,
        public readonly ?string $publicId = null,
        public readonly ?int $quantity = null,
        public readonly ?string $prorated = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
        public readonly ?ProductVariantDTO $productsVariant = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
