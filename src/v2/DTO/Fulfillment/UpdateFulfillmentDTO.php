<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Fulfillment;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;
use Zendrop\Data\Skippable;

class UpdateFulfillmentDTO extends BaseDTO
{
    public function __construct(
        public readonly string|Skippable|null $trackingUrl = Skippable::Skipped,
        public readonly string|Skippable|null $shippingProvider = Skippable::Skipped,
        public readonly string|Skippable|null $trackingCode = Skippable::Skipped,
        public readonly bool|Skippable $notifyCustomer = Skippable::Skipped,
    ) {
    }
}
