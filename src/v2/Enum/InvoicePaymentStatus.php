<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Enum;

enum InvoicePaymentStatus: string
{
    case abandoned = 'abandoned';
    case PAID = 'paid';
    case PARTIALLY_PAID = 'partially-paid';
    case PARTIALLY_REFUNDED = 'partially-refunded';
    case PAST_DUE = 'past-due';
    case REFUNDED = 'refunded';
    case UNPAID = 'unpaid';
    case VOIDED = 'voided';
    case DISPUTED = 'disputed';
    case DRAFT = 'draft';
}
