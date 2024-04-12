<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Order;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;
use Zendrop\Data\Skippable;

class FilterGetOrdersDTO extends BaseDTO
{
    public function __construct(
        /** @var string|int[]|Skippable $id */
        public readonly string|array|Skippable $id = Skippable::Skipped,

        /** @var string|int[]|Skippable $contactId */
        public readonly string|array|Skippable $contactId = Skippable::Skipped,

        public readonly string|Skippable $fulfillmentStatus = Skippable::Skipped,
    ) {
    }
}
