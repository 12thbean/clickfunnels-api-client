<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Order;

use Zendrop\ClickFunnelsApiClient\v2\DTO\Order\FilterGetOrdersDTO;
use Zendrop\ClickFunnelsApiClient\v2\Pagination\RequestContextDTO;

class ListOrdersRequestContextDTO extends RequestContextDTO
{
    public function __construct(
        public readonly ?string $sortOrder = 'asc',
        public readonly ?FilterGetOrdersDTO $filter = null,
    ) {
    }
}
