<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Order;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class FilterGetOrdersDTO extends BaseDTO
{
    public function __construct(
        /** @var string|array<int,int>|null $id */
        public readonly string|array|null $id,
        /** @var string|array<int,int>|null $contactId */
        public readonly string|array|null $contactId,
    ) {
    }
}
