<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\ProductVariant;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class CreateProductVariantDTO extends BaseDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $weightUnit,
        public readonly ?string $sku = null,
        public readonly ?string $outOfStockSales = null,
        public readonly ?float $weight = null,
        public readonly ?float $height = null,
        public readonly ?float $width = null,
        public readonly ?float $length = null,
        public readonly ?string $dimensionsUnit = null,
        public readonly ?string $taxCategoryId = null,
        public readonly ?string $taxable = null,
        public readonly ?bool $trackQuantity = null,
        public readonly ?bool $archived = null,
        public readonly ?bool $visible = null,
        public readonly ?bool $fulfillmentRequired = null,
        public readonly ?string $countryOfManufactureId = null,
    ) {
    }
}
