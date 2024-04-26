<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Product;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;
use Zendrop\Data\Skippable;

class UpdateProductDTO extends BaseDTO
{
    public function __construct(
        public readonly string|Skippable $name = Skippable::Skipped,
        public readonly string|Skippable|null $currentPath = Skippable::Skipped,
        public readonly bool|Skippable|null $visibleInStore = Skippable::Skipped,
        public readonly bool|Skippable|null $visibleInCustomerCenter = Skippable::Skipped,
        public readonly string|Skippable|null $seoTitle = Skippable::Skipped,
        public readonly string|Skippable|null $seoDescription = Skippable::Skipped,
        public readonly string|Skippable|null $seoImageId = Skippable::Skipped,
        public readonly bool|Skippable|null $commissionable = Skippable::Skipped,
        /** @var int[]|Skippable|null $imageIds */
        public readonly array|Skippable|null $imageIds = Skippable::Skipped,
        /** @var int[]|Skippable|null $variantIds */
        public readonly array|Skippable|null $variantIds = Skippable::Skipped,
        /** @var int[]|Skippable|null $priceIds */
        public readonly array|Skippable|null $priceIds = Skippable::Skipped,
        public readonly string|Skippable|null $redirectFunnelId = Skippable::Skipped,
        public readonly string|Skippable|null $cancellationFunnelUrl = Skippable::Skipped,
        /** @var int[]|Skippable|null $tagIds */
        public readonly array|Skippable|null $tagIds = Skippable::Skipped,
    ) {
    }
}
