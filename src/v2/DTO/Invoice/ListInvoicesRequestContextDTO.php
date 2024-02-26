<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Invoice;

use Zendrop\ClickFunnelsApiClient\v2\Pagination\RequestContextDTO;

class ListInvoicesRequestContextDTO extends RequestContextDTO
{
    public function __construct(
        public readonly int $orderId,
        public readonly ?string $sortOrder = 'asc',
    ) {
    }
}
