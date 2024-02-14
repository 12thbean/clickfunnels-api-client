<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Contact;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

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
