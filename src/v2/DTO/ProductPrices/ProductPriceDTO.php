<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\ProductPrices;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class ProductPriceDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $public_id,
        public readonly ?int $variant_id = null,
        public readonly ?string $name = null,
        public readonly ?string $amount = null,
        public readonly ?string $cost = null,
        public readonly ?string $currency = null,
        public readonly ?string $duration = null,
        public readonly ?string $interval = null,
        public readonly ?string $trial_interval = null,
        public readonly ?string $trial_duration = null,
        public readonly ?string $trial_amount = null,
        public readonly ?string $setup_amount = null,
        public readonly ?bool $self_cancel = null,
        public readonly ?bool $self_upgrade = null,
        public readonly ?bool $self_downgrade = null,
        public readonly ?bool $self_reactivate = null,
        public readonly ?int $interval_count = null,
        public readonly ?string $payment_type = null,
        public readonly ?bool $visible = null,
        public readonly ?string $compare_at_amount = null,
        public readonly ?string $key = null,
        public readonly ?bool $archived = null,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
