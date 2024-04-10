<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Fulfillment;

class InvoiceLineItemAttributesDTO
{
    public function __construct(
        public readonly int $invoicesLineItemId,
        public readonly int $quantity,
    ) {
    }
}
