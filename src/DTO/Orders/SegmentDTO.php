<?php

namespace Zendrop\ClickFunnelsApiClient\DTO\Orders;

use Zendrop\ClickFunnelsApiClient\DTO\BaseDTO;

class SegmentDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,

        mixed ...$data,
    ) {
        unset($data);
    }
}
