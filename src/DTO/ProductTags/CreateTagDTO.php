<?php

namespace Zendrop\ClickFunnelsApiClient\DTO\ProductTags;

use Zendrop\ClickFunnelsApiClient\DTO\BaseDTO;

class CreateTagDTO extends BaseDTO
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $color = null,
    ) {
    }
}
