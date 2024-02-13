<?php

namespace Zendrop\ClickFunnelsApiClient\DTO\ProductTags;

use Zendrop\ClickFunnelsApiClient\DTO\BaseDTO;

class ProductTagDTO extends BaseDTO
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $color,
        mixed ...$data,
    ) {
        unset($data);
    }
}
