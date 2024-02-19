<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Order;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;
use Zendrop\ClickFunnelsApiClient\v2\Enum\InvoiceType;

class InvoiceDTO extends BaseDTO
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $order_id = null,
        public readonly ?string $status = null,
        public readonly ?string $public_id = null,
        public readonly ?string $due_amount = null,
        public readonly ?string $total_amount = null,
        public readonly ?string $subtotal_amount = null,
        public readonly ?string $tax_amount = null,
        public readonly ?string $shipping_amount = null,
        public readonly ?string $discount_amount = null,
        public readonly ?string $currency = null,
        public readonly ?string $issued_at = null,
        public readonly ?string $due_at = null,
        public readonly ?string $paid_at = null,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null,
        public readonly ?InvoiceType $invoice_type = null,

        /** @var array<int,LineItemDTO>|null */
        public readonly ?array $line_items = null, 

        mixed ...$data,
    ) {
        unset($data);
    }
}