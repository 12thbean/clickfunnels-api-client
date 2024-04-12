<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Fulfillment;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;
use Zendrop\ClickFunnelsApiClient\v2\Enum\FulfillmentStatus;
use Zendrop\Data\ArrayOf;

class FulfillmentRestockDTO extends BaseDTO
{
    public function __construct(
        /** Fulfillment ID */
        public readonly int $id,

        public readonly int $workspaceId,

        /** The contact that made the order that is being fulfilled. */
        public readonly int $contactId,

        /** The status of the fulfillment */
        public readonly FulfillmentStatus $status,

        /** The fulfillment ID that would be visible to the customer within the CF app */
        public readonly ?string $publicId = null,

        /** Tracking URL */
        public readonly ?string $trackingUrl = null,

        /** Shipping Provider */
        public readonly ?string $shippingProvider = null,

        /** Tracking Code */
        public readonly ?string $trackingCode = null,

        /** An auto-generated number of the fulfillment */
        public readonly ?int $fulfillmentNumber = null,

        /** @var ?FulfillmentRestockInvoiceLineItem[] */
        #[ArrayOf(FulfillmentRestockInvoiceLineItem::class)]
        public readonly ?array $includedInvoicesLineItems = null,

        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
