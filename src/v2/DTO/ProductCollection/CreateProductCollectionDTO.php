<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\ProductCollection;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;
use Zendrop\ClickFunnelsApiClient\v2\Enum\Products\CollectionType;
use Zendrop\Data\Skippable;

class CreateProductCollectionDTO extends BaseDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string|Skippable|null $description = Skippable::Skipped,
        public readonly CollectionType|Skippable|null $collectionType = Skippable::Skipped,
        /** @var int[] $productIds */
        public readonly array|null|Skippable $productIds = Skippable::Skipped,
        public readonly string|null|Skippable $sortMethod = Skippable::Skipped,
        public readonly string|null|Skippable $imageId = Skippable::Skipped,
        public readonly bool|null|Skippable $visibleInStore = Skippable::Skipped,
        public readonly string|null|Skippable $seoTitle = Skippable::Skipped,
        public readonly string|null|Skippable $seoDescription = Skippable::Skipped,
        public readonly string|null|Skippable $socialImageId = Skippable::Skipped,
    ) {
    }
}
