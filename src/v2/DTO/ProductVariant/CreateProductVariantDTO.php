<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\ProductVariant;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class CreateProductVariantDTO extends BaseDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $weight_unit,
        public readonly ?string $sku = null,
        public readonly ?string $out_of_stock_sales = null,
        public readonly ?float $weight = null,
        public readonly ?float $height = null,
        public readonly ?float $width = null,
        public readonly ?float $length = null,
        public readonly ?string $dimensions_unit = null,
        public readonly ?string $tax_category_id = null,
        public readonly ?string $taxable = null,
        public readonly ?bool $track_quantity = null,
        public readonly ?bool $archived = null,
        public readonly ?bool $visible = null,
        public readonly ?bool $fulfillment_required = null,
        public readonly ?string $country_of_manufacture_id = null,
    ) {
    }
}
