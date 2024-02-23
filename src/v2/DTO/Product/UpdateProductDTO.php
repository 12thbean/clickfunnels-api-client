<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Product;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class UpdateProductDTO extends BaseDTO
{
    public function __construct(
        /** @var array<mixed,mixed> $fields */
        public readonly array $fields = [],
    ) {
    }
}
