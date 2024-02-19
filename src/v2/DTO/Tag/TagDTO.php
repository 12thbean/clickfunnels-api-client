<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Tag;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class TagDTO extends BaseDTO
{
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $color = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
