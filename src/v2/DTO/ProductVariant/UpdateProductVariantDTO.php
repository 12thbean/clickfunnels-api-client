<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\ProductVariant;

use Zendrop\ClickFunnelsApiClient\v2\DTO\RequestDTO;

class UpdateProductVariantDTO extends RequestDTO
{
    public function __construct(
        /** @var array<mixed,mixed> $fields */
        public readonly array $fields = [],
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return static::toArrayR($this->fields);
    }
}
