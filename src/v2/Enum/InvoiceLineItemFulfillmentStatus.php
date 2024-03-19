<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Enum;

enum InvoiceLineItemFulfillmentStatus: string
{
    case UNFULFILLED = 'unfulfilled';
    case PARTIALLY_FULFILLED = 'partially_fulfilled';
    case COMPLETE = 'complete';

    /** "ignored" is for line items that don't need fulfillment like setup fees */
    case IGNORED = 'ignored';
}
