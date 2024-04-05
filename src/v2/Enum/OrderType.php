<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Enum;

enum OrderType: string
{
    case OneTime = 'one-time-order';
    case Subscription = 'subscription';
}
