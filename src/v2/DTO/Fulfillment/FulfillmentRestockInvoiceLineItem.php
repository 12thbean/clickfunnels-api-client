<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Fulfillment;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class FulfillmentRestockInvoiceLineItem extends BaseDTO
{
    public function __construct(
        /** Included orders line item ID */
        public readonly int $id,

        /** The quantity of the invoices line item subject that is part of this fulfillment. Your stock must have enough quantity for a successful fulfillment. */
        public readonly int $quantity,

        /** The invoice line item of an order that is part of this fulfillment. */
        public readonly int $invoicesLineItemId,

        /** The public ID of the included order invoices line item */
        public readonly ?string $publicId = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
