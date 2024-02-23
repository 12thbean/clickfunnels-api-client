<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\ProductVariant;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class UpdateProductVariantDTO extends BaseDTO
{
    public function __construct(
        /** @var array<mixed,mixed> $fields */
        public readonly array $fields = [],
    ) {
    }
}
