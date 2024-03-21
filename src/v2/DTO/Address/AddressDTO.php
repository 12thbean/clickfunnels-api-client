<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Address;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class AddressDTO extends BaseDTO
{
    public function __construct(
        public readonly string $addressOne,
        public readonly string $addressTwo,
        public readonly string $city,
        public readonly string $region,
        public readonly string $country,
        public readonly ?string $postalCode = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
