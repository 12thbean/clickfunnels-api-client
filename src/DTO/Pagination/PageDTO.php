<?php

namespace Zendrop\ClickFunnelsApiClient\DTO\Pagination;

use Zendrop\ClickFunnelsApiClient\DTO\BaseDTO;

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
