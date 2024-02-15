<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Enum;

enum InvoiceType: string
{
    case INITIAL = 'initial';
    case RENEWAL = 'renewal';
    case INTERIM = 'interim';
    case CANCELLATION = 'cancellation';
    case ONE_TIME = 'one_time';
    case REFUND = 'refund';
    case CHARGE = 'charge';
    case ONE_TIME_SALE = 'one_time_sale';
}
