<?php

namespace Zendrop\ClickFunnelsApiClient\DTO\Contacts;

use Zendrop\ClickFunnelsApiClient\DTO\BaseDTO;

class ContactGroupDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        
        mixed ...$data,
    ) {
        unset($data);
    }
}
