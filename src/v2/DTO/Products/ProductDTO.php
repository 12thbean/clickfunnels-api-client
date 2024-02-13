<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Products;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class ProductDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        mixed ...$data,
    ) {
        unset($data);
    }
}
