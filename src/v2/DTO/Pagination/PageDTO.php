<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Pagination;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class PageDTO extends BaseDTO
{
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $url = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
