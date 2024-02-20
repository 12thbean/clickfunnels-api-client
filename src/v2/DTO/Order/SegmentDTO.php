<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Order;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

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
