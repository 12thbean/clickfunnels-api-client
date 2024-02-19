<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Contact;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class ContactGroupDTO extends BaseDTO
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $name = null,
        
        mixed ...$data,
    ) {
        unset($data);
    }
}
