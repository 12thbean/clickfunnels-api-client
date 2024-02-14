<?php

namespace Zendrop\ClickFunnelsApiClient\DTO\Contacts;

use Zendrop\ClickFunnelsApiClient\DTO\BaseDTO;

class ContactTagDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly ?string $color,
        
        mixed ...$data,
    ) {
        unset($data);
    }
}
