<?php

namespace Zendrop\ClickFunnelsApiClient\DTO\Product;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class ProductVariantDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $public_id,
        public readonly int $product_id,
        public readonly string $name,
        public readonly ?string $sku,
        public readonly ?string $out_of_stock_sales,
        public readonly ?float $weight,
        public readonly ?string $weight_unit,
        public readonly ?float $height,
        public readonly ?float $width,
        public readonly ?float $length,
        public readonly ?string $dimensions_unit,
        public readonly ?int $quantity,
        public readonly ?string $tax_category_id,
        public readonly ?string $taxable,
        public readonly ?bool $track_quantity,
        public readonly ?bool $archived,
        public readonly ?bool $visible,
        public readonly ?bool $fulfillment_required,
        public readonly ?string $country_of_manufacture_id,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,

        /** @var array<int,int>|null */
        public readonly ?array $properties_value_ids,

        /** @var array<int,int>|null */
        public readonly ?array $tag_ids,

        /** @var array<int,int>|null */
        public readonly ?array $asset_ids,

        /** @var array<int,int>|null */
        public readonly ?array $price_ids,

        mixed ...$data,
    ) {
        unset($data);
    }
}
