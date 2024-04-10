<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Fulfillment;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class CreateFulfillmentDTO extends BaseDTO
{
    public function __construct(
        public readonly int $contactId,
        public readonly int $locationId,
        /** @var InvoiceLineItemAttributesDTO[] */
        public readonly array $includedOrdersInvoicesLineItemsAttributes,
        public readonly bool $ignoreOutOfStock = false,
        public readonly bool $notifyCustomer = false,
        public readonly ?string $trackingUrl = null,
        public readonly ?string $shippingProvider = null,
        public readonly ?string $trackingCode = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
