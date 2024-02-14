<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\ProductTags;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class CreateTagDTO extends BaseDTO
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $color = null,
    ) {
    }
}
