<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\ProductVariant;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;
use Zendrop\ClickFunnelsApiClient\v2\Enum\Products\ProductType;
use Zendrop\ClickFunnelsApiClient\v2\Enum\Products\WeightUnit;
use Zendrop\Data\Skippable;

class UpdateProductVariantDTO extends BaseDTO
{
    public function __construct(
        public readonly string|Skippable $name = Skippable::Skipped,
        public readonly ProductType|Skippable $productType = Skippable::Skipped,
        public readonly WeightUnit|Skippable $weightUnit = Skippable::Skipped,
        public readonly string|null|Skippable $description = Skippable::Skipped,
        public readonly string|null|Skippable $sku = Skippable::Skipped,
        public readonly string|null|Skippable $outOfStockSales = Skippable::Skipped,
        public readonly float|null|Skippable $weight = Skippable::Skipped,
        public readonly float|null|Skippable $height = Skippable::Skipped,
        public readonly float|null|Skippable $width = Skippable::Skipped,
        public readonly float|null|Skippable $length = Skippable::Skipped,
        public readonly string|null|Skippable $dimensionsUnit = Skippable::Skipped,
        public readonly string|null|Skippable $taxCategoryId = Skippable::Skipped,
        public readonly string|null|Skippable $taxable = Skippable::Skipped,
        public readonly bool|null|Skippable $trackQuantity = Skippable::Skipped,
        public readonly bool|null|Skippable $archived = Skippable::Skipped,
        public readonly bool|null|Skippable $visible = Skippable::Skipped,
        public readonly bool|null|Skippable $fulfillmentRequired = Skippable::Skipped,
        public readonly string|null|Skippable $countryOfManufactureId = Skippable::Skipped,
        /** @var int[]|null|Skippable $imageIds */
        public readonly array|null|Skippable $imageIds = Skippable::Skipped,
        /** @var int[]|null|Skippable $fulfillmentsLocationIds */
        public readonly array|null|Skippable $fulfillmentsLocationIds = Skippable::Skipped,
    ) {
    }
}
