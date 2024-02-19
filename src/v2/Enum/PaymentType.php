<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Enum;

enum PaymentType: string
{
    case ONE_TIME = "one_time";
    case SUBSCRIPTION = "subscription";
    case PAYMENT_PLAN = "payment_plan";
}
