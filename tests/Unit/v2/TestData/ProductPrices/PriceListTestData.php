<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductPrices;

final class PriceListTestData
{
    /**
     * @return array<int, array<string, mixed>>
     * @throws \JsonException
     */
    public static function list(): array
    {
        $jsonResponse = <<<JSON
        [
          {
            "id": 10231,
            "public_id": "jZpOKE",
            "variant_id": 16441,
            "name": "First Price",
            "amount": "29.00",
            "cost": "0.00",
            "currency": "usd",
            "duration": 1,
            "interval": "months",
            "trial_interval": null,
            "trial_duration": null,
            "trial_amount": "0.00",
            "setup_amount": null,
            "self_cancel": true,
            "self_upgrade": true,
            "self_downgrade": true,
            "self_reactivate": true,
            "interval_count": 1,
            "payment_type": "one_time",
            "visible": true,
            "compare_at_amount": null,
            "key": null,
            "archived": false,
            "created_at": "2024-01-30T15:38:03.149Z",
            "updated_at": "2024-01-30T15:38:03.149Z"
          },
          {
            "id": 10961,
            "public_id": "JLkVAN",
            "variant_id": 16113,
            "name": "",
            "amount": "100.00",
            "cost": "0.00",
            "currency": "usd",
            "duration": 1,
            "interval": "months",
            "trial_interval": null,
            "trial_duration": null,
            "trial_amount": "0.00",
            "setup_amount": null,
            "self_cancel": true,
            "self_upgrade": true,
            "self_downgrade": true,
            "self_reactivate": true,
            "interval_count": 1,
            "payment_type": "one_time",
            "visible": true,
            "compare_at_amount": null,
            "key": "",
            "archived": false,
            "created_at": "2024-01-31T17:31:54.394Z",
            "updated_at": "2024-01-31T17:31:54.394Z"
          },
          {
            "id": 12713,
            "public_id": "YrxDbj",
            "variant_id": 16141,
            "name": "",
            "amount": "100.00",
            "cost": "0.00",
            "currency": "usd",
            "duration": 1,
            "interval": "months",
            "trial_interval": null,
            "trial_duration": null,
            "trial_amount": "0.00",
            "setup_amount": null,
            "self_cancel": true,
            "self_upgrade": true,
            "self_downgrade": true,
            "self_reactivate": true,
            "interval_count": 1,
            "payment_type": "one_time",
            "visible": true,
            "compare_at_amount": null,
            "key": "",
            "archived": false,
            "created_at": "2024-02-05T12:18:32.104Z",
            "updated_at": "2024-02-05T12:18:32.104Z"
          }
        ]
JSON;

        return json_decode($jsonResponse, true, 512, JSON_THROW_ON_ERROR);
    }
}
