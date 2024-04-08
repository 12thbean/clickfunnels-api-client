<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Enum;

enum FulfillmentStatus: string
{
    case Cancelled = 'cancelled';
    case Fulfilled = 'fulfilled';
    case Restocked = 'restocked';
}
