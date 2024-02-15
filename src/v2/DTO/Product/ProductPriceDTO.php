<?php

namespace Zendrop\ClickFunnelsApiClient\DTO\Product;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;
use Zendrop\ClickFunnelsApiClient\v2\Enum\PaymentType;

class ProductPriceDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $amount,
        public readonly string $currency,
        public readonly int $duration,
        public readonly string $interval,
        public readonly string $interval_count,

        public readonly ?string $public_id = null,
        public readonly ?int $variant_id = null,
        public readonly ?string $name = null,
        public readonly ?string $cost = null,
        public readonly ?string $trial_interval = null,
        public readonly ?string $trial_duration = null,
        public readonly ?string $trial_amount = null,
        public readonly ?string $setup_amount = null,
        public readonly ?bool $self_cancel = null,
        public readonly ?bool $self_upgrade = null,
        public readonly ?bool $self_downgrade = null,
        public readonly ?bool $self_reactivate = null,
        public readonly ?bool $visible = null,
        public readonly ?string $compare_at_amount = null,
        public readonly ?string $key = null,
        public readonly ?bool $archived = null,
        public readonly ?bool $created_at = null,
        public readonly ?bool $updated_at = null,
        public readonly ?PaymentType $payment_type = null,

        mixed ...$data,
    ) {
        unset($data);
    }
}
