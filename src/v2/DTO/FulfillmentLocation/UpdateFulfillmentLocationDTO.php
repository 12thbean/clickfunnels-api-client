<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\FulfillmentLocation;

use Zendrop\ClickFunnelsApiClient\v2\DTO\Address\AddressDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;
use Zendrop\Data\Skippable;

class UpdateFulfillmentLocationDTO extends BaseDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string|Skippable|null $addressName = Skippable::Skipped,
        public readonly string|Skippable|null $emailAddress = Skippable::Skipped,
        public readonly string|Skippable|null $phoneNumber = Skippable::Skipped,
        public readonly bool|Skippable $externalApp = Skippable::Skipped,
        public readonly AddressDTO|Skippable|null $address = Skippable::Skipped,
    ) {
    }
}
