<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Invoice;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;
use Zendrop\ClickFunnelsApiClient\v2\Enum\InvoiceType;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Order\LineItemDTO;
use Zendrop\ClickFunnelsApiClient\v2\Enum\InvoicePaymentStatus;

class InvoiceDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly int $orderId,
        public readonly InvoicePaymentStatus $status,
        public readonly ?string $publicId = null,
        public readonly ?string $dueAmount = null,
        public readonly ?string $totalAmount = null,
        public readonly ?string $subtotalAmount = null,
        public readonly ?string $taxAmount = null,
        public readonly ?string $shippingAmount = null,
        public readonly ?string $discountAmount = null,
        public readonly ?string $currency = null,
        public readonly ?string $issuedAt = null,
        public readonly ?string $dueAt = null,
        public readonly ?string $paidAt = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
        public readonly ?InvoiceType $invoiceType = null,
        /** @var array<int,LineItemDTO>|null */
        public readonly ?array $lineItems = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
