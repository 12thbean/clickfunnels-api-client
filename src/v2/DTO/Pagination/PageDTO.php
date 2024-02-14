<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Pagination;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class PageDTO extends BaseDTO
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $url,
        mixed ...$data,
    ) {
        unset($data);
    }
}
