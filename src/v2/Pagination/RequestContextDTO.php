<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Pagination;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class RequestContextDTO extends BaseDTO
{
    public function __construct(
        public readonly ?string $sortOrder = 'asc',
    ) {
    }
}
