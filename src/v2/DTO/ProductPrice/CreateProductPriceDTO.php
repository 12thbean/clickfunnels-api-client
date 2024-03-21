<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\ProductPrice;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class CreateProductPriceDTO extends BaseDTO
{
    public function __construct(
        public readonly string $amount,
        public readonly string $currency,
        public readonly ?int $duration = null,
        public readonly ?string $interval = null,
        public readonly ?string $trialInterval = null,
        public readonly ?string $trialDuration = null,
        public readonly ?int $intervalCount = null,
        public readonly ?string $trialAmount = null,
        public readonly ?string $name = null,
        public readonly ?string $cost = null,
        public readonly ?string $setupAmount = null,
        public readonly ?bool $selfCancel = null,
        public readonly ?bool $selfUpgrade = null,
        public readonly ?bool $selfDowngrade = null,
        public readonly ?bool $selfReactivate = null,
        public readonly ?string $paymentType = null,
        public readonly ?bool $visible = null,
        public readonly ?string $compareAtAmount = null,
        public readonly ?string $key = null,
        public readonly ?bool $archived = null,
        /** @var string[] $fields */
        public readonly array $fields = [],
    ) {
    }
}
