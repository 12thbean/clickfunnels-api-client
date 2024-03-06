<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\ProductImage;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class CreateImageDTO extends BaseDTO
{
    public function __construct(
        public readonly string $uploadSourceUrl,
        public readonly ?string $altText = null,
        public readonly ?string $name = null,
    ) {
    }
}
