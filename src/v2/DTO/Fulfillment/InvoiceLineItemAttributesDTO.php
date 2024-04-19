<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Fulfillment;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class InvoiceLineItemAttributesDTO extends BaseDTO
{
    public function __construct(
        public readonly int $invoicesLineItemId,
        public readonly int $quantity,
        mixed ...$data,
    ) {
        unset($data);
    }
}
