<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Product;

use Zendrop\ClickFunnelsApiClient\v2\DTO\RequestDTO;

class CreateProductDTO extends RequestDTO
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $currentPath = null,
        public readonly ?bool $visibleInStore = null,
        public readonly ?bool $visibleInCustomerCenter = null,
        public readonly ?string $seoTitle = null,
        public readonly ?string $seoDescription = null,
        public readonly ?string $seoImageId = null,
        public readonly ?bool $commissionable = null,
        public readonly ?string $redirectFunnelId = null,
        public readonly ?string $cancellationFunnelUrl = null,
        /** @var int[] $imageIds */
        public readonly ?array $imageIds = null,
        /** @var int[] $variantIds */
        public readonly ?array $variantIds = null,
        /** @var int[] $priceIds */
        public readonly ?array $priceIds = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
