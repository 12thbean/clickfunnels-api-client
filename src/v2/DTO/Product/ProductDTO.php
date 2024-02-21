<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Product;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class ProductDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly int $workspaceId,
        public readonly ?string $publicId = null,
        public readonly ?string $currentPath = null,
        public readonly ?bool $archived = null,
        public readonly ?bool $visibleInStore = null,
        public readonly ?bool $visibleInCustomerCenter = null,
        public readonly ?string $imageId = null,
        public readonly ?string $seoTitle = null,
        public readonly ?string $seoDescription = null,
        public readonly ?string $seoImageId = null,
        public readonly ?bool $commissionable = null,
        public readonly ?string $redirectFunnelId = null,
        public readonly ?string $cancellationFunnelUrl = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
        /** @var array<int,int> */
        public readonly ?array $imageIds = null,
        /** @var array<int,int> */
        public readonly ?array $variantIds = null,
        /** @var array<int,int> */
        public readonly ?array $priceIds = null,
        /** @var array<int,int> */
        public readonly ?array $tagIds = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
