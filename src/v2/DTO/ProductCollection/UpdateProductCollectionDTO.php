<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\ProductCollection;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;
use Zendrop\ClickFunnelsApiClient\v2\Enum\Products\CollectionType;
use Zendrop\Data\Skippable;

class UpdateProductCollectionDTO extends BaseDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string|Skippable|null $description = Skippable::Skipped,
        public readonly CollectionType|Skippable|null $collectionType = Skippable::Skipped,
        /** @var int[] $productIds */
        public readonly array|Skippable|null $productIds = [],
        public readonly string|Skippable|null $sortMethod = Skippable::Skipped,
        public readonly string|Skippable|null $imageId = Skippable::Skipped,
        public readonly bool|Skippable|null $visibleInStore = Skippable::Skipped,
        public readonly string|Skippable|null $seoTitle = Skippable::Skipped,
        public readonly string|Skippable|null $seoDescription = Skippable::Skipped,
        public readonly string|Skippable|null $socialImageId = Skippable::Skipped,
    ) {
    }
}
