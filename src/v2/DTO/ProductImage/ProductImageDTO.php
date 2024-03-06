<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\ProductImage;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class ProductImageDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly int $workspaceId,
        public readonly string $url,
        public readonly ?string $publicId = null,
        public readonly ?string $altText = null,
        public readonly ?string $name = null,
        public readonly ?int $height = null,
        public readonly ?int $width = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
