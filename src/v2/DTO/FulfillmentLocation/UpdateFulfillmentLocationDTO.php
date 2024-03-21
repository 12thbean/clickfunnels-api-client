<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\FulfillmentLocation;

use Zendrop\ClickFunnelsApiClient\v2\DTO\Address\AddressDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class UpdateFulfillmentLocationDTO extends BaseDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $addressName,
        public readonly string $emailAddress,
        public readonly ?string $phoneNumber = null,
        public readonly ?bool $externalApp = false,
        public readonly ?AddressDTO $address = null,
    ) {
    }
}
