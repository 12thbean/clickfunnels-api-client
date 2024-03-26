<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Product;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class PropertyValueDTO extends BaseDTO
{
    public function __construct(
        public readonly int $propertyId,
        public readonly string $value,
    ) {
    }
}
