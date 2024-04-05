<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\FulfillmentLocation;

use Zendrop\ClickFunnelsApiClient\v2\DTO\Address\AddressDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class FulfillmentLocationDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly int $workspaceId,
        public readonly string $name,
        public readonly ?string $addressName = null,
        public readonly ?string $emailAddress = null,
        public readonly ?AddressDTO $address = null,
        public readonly ?string $publicId = null,
        public readonly ?string $phoneNumber = null,
        public readonly ?int $sortOrder = null,
        public readonly ?bool $externalApp = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
