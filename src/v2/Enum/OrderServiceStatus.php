<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Enum;

enum OrderServiceStatus: string
{
    case PENDING = 'pending';
    case ACTIVE = 'active';
    case COMPLETED = 'completed';
    case CHURNED = 'churned';
    case CANCELED = 'canceled';
    case SUSPENDED = 'suspended';
    case PAUSED = 'paused';
    case ABANDONED = 'abandoned';
    case TRIALING = 'trialing';
    case TRIAL = 'trial-ended';
    case VOIDED = 'voided';
}
