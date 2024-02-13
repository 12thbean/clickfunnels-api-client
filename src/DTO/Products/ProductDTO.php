<?php

namespace Zendrop\ClickFunnelsApiClient\DTO\Products;

use Zendrop\ClickFunnelsApiClient\DTO\BaseDTO;

class ProductDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        mixed ...$data,
    ) {
        unset($data);
    }
}
