<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Address;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class AddressDTO extends BaseDTO
{
    public function __construct(
        public readonly ?string $addressOne = null,
        public readonly ?string $addressTwo = null,
        public readonly ?string $city = null,
        public readonly ?string $region = null,
        public readonly ?string $country = null,
        public readonly ?string $postalCode = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
