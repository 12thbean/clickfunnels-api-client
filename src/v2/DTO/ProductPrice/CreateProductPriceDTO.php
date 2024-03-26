<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\ProductPrice;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;
use Zendrop\Data\Skippable;

class CreateProductPriceDTO extends BaseDTO
{
    public function __construct(
        public readonly string $amount,
        public readonly string $currency,
        public readonly null|int|Skippable $duration = Skippable::Skipped,
        public readonly null|string|Skippable $interval = Skippable::Skipped,
        public readonly null|string|Skippable $trialInterval = Skippable::Skipped,
        public readonly null|string|Skippable $trialDuration = Skippable::Skipped,
        public readonly null|int|Skippable $intervalCount = Skippable::Skipped,
        public readonly null|string|Skippable $trialAmount = Skippable::Skipped,
        public readonly null|string|Skippable $name = Skippable::Skipped,
        public readonly null|string|Skippable $cost = Skippable::Skipped,
        public readonly null|string|Skippable $setupAmount = Skippable::Skipped,
        public readonly null|bool|Skippable $selfCancel = Skippable::Skipped,
        public readonly null|bool|Skippable $selfUpgrade = Skippable::Skipped,
        public readonly null|bool|Skippable $selfDowngrade = Skippable::Skipped,
        public readonly null|bool|Skippable $selfReactivate = Skippable::Skipped,
        public readonly null|string|Skippable $paymentType = Skippable::Skipped,
        public readonly null|bool|Skippable $visible = Skippable::Skipped,
        public readonly null|string|Skippable $compareAtAmount = Skippable::Skipped,
        public readonly null|string|Skippable $key = Skippable::Skipped,
        public readonly null|bool|Skippable $archived = Skippable::Skipped,
    ) {
    }
}
