<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\ProductPrice;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;
use Zendrop\ClickFunnelsApiClient\v2\Enum\PaymentType;

class CreateProductPriceDTO extends BaseDTO
{
    public function __construct(
        public readonly string $amount,
        public readonly string $currency,
        public readonly int $duration,
        public readonly string $interval,
        public readonly string $trial_interval,
        public readonly string $trial_duration,
        public readonly int $interval_count,
        public readonly string $trial_amount,
        public readonly ?string $name = null,
        public readonly ?string $cost = null,
        public readonly ?string $setup_amount = null,
        public readonly ?bool $self_cancel = null,
        public readonly ?bool $self_upgrade = null,
        public readonly ?bool $self_downgrade = null,
        public readonly ?bool $self_reactivate = null,
        public readonly ?string $payment_type = null,
        public readonly ?bool $visible = null,
        public readonly ?string $compare_at_amount = null,
        public readonly ?string $key = null,
        public readonly ?bool $archived = null,
        /** @var string[] $fields */
        public readonly array $fields = [],
    ) {
    }
}
