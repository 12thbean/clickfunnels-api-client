<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Enum;

enum OrderBillingStatus: string
{
    /** Invoice is issued to the customer. It is not paid. The payment time-frame has not exceeded. */
    case UNPAID = 'unpaid';

    /** Invoice is issued to the customer. It is not paid. The payment time-frame has exceeded by more than 24 hours. */
    case PAST_DUE = 'past-due';

    /** An invoice is not paid, or not paid in full, and has been abandoned by the customer. */
    case ABANDONED = 'abandoned';

    /** Invoice is paid by the customer. */
    case PAID = 'paid';

    /** Invoice amount is partially paid by the customer */
    case PARTIALLY_PAID = 'partially-paid';

    /** Invoice amount is set to zero. Voiding retains the invoice number and lists it in reports but changes the amounts to zero. */
    case VOIDED = 'voided';

    /** Invoice amount paid is disputed by the customer or merchant */
    case DISPUTED = 'disputed';

    /** Invoice amount is fully refunded to the customer. */
    case REFUNDED = 'refunded';

    /** Invoice amount is partially refunded to the customer. */
    case PARTIALLY_REFUNDED = 'partially-refunded';

    case PENDING = 'pending';

    case DRAFT = 'draft';

    case FAILED = 'failed';

    case DELINQUENT = 'delinquent';

    case REFUND_PENDING = 'refund-pending';
}
