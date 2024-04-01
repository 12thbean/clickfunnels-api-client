<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\ProductVariant;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\PropertyValueDTO;
use Zendrop\ClickFunnelsApiClient\v2\Enum\Products\ProductType;
use Zendrop\Data\ArrayOf;

class ProductVariantDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly ?int $productId = null,
        public readonly ?string $weightUnit = null,
        public readonly ?string $publicId = null,
        public readonly ?string $description = null,
        public readonly ?string $sku = null,
        public readonly ?ProductType $productType = null,
        public readonly ?string $outOfStockSales = null,
        public readonly ?float $weight = null,
        public readonly ?float $height = null,
        public readonly ?float $width = null,
        public readonly ?float $length = null,
        public readonly ?string $dimensionsUnit = null,
        public readonly ?int $quantity = null,
        public readonly ?string $taxCategoryId = null,
        public readonly ?string $taxable = null,
        public readonly ?bool $trackQuantity = null,
        public readonly ?bool $archived = null,
        public readonly ?bool $visible = null,
        public readonly ?bool $fulfillmentRequired = null,
        public readonly ?string $countryOfManufactureId = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
        public readonly ?bool $default = null,
        /** @var PropertyValueDTO[] $propertiesValues */
        #[ArrayOf(PropertyValueDTO::class)]
        public readonly ?array $propertiesValues = null,
        /** @var int[]|null */
        public readonly ?array $tagIds = null,
        /** @var int[]|null */
        public readonly ?array $imageIds = null,
        /** @var int[]|null */
        public readonly ?array $fulfillmentsLocationIds = null,
        /** @var int[]|null */
        public readonly ?array $assetIds = null,
        /** @var int[]|null */
        public readonly ?array $priceIds = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
