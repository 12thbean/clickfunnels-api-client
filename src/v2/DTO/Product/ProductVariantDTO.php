<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Product;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class ProductVariantDTO extends BaseDTO
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $name = null,
        public readonly ?int $product_id = null,
        public readonly ?string $public_id = null,
        public readonly ?string $sku = null,
        public readonly ?string $out_of_stock_sales = null,
        public readonly ?float $weight = null,
        public readonly ?string $weight_unit = null,
        public readonly ?float $height = null,
        public readonly ?float $width = null,
        public readonly ?float $length = null,
        public readonly ?string $dimensions_unit = null,
        public readonly ?int $quantity = null,
        public readonly ?string $tax_category_id = null,
        public readonly ?string $taxable = null,
        public readonly ?bool $track_quantity = null,
        public readonly ?bool $archived = null,
        public readonly ?bool $visible = null,
        public readonly ?bool $fulfillment_required = null,
        public readonly ?string $country_of_manufacture_id = null,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null,

        /** @var array<int,int>|null */
        public readonly ?array $properties_value_ids = null,

        /** @var array<int,int>|null */
        public readonly ?array $tag_ids = null,

        /** @var array<int,int>|null */
        public readonly ?array $asset_ids = null,

        /** @var array<int,int>|null */
        public readonly ?array $price_ids = null,

        mixed ...$data,
    ) {
        unset($data);
    }
}
