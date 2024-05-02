<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\ProductCollection;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;
use Zendrop\ClickFunnelsApiClient\v2\Enum\Products\CollectionType;

class ProductCollectionDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly int $workspaceId,
        public readonly string $name,
        public readonly ?string $publicId,
        public readonly ?string $description = null,
        public readonly ?CollectionType $collectionType = null,
        /** @var int[] $productIds */
        public readonly ?array $productIds = null,
        public readonly ?string $sortMethod = null,
        public readonly ?bool $archived = null,
        public readonly ?string $imageId = null,
        public readonly ?bool $visibleInStore = null,
        public readonly ?string $currentPath = null,
        public readonly ?string $seoTitle = null,
        public readonly ?string $seoDescription = null,
        public readonly ?bool $seoIndexable = null,
        public readonly ?int $socialImageId = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
    ) {
    }
}
