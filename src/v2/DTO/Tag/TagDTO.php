<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Tag;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class TagDTO extends BaseDTO
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
