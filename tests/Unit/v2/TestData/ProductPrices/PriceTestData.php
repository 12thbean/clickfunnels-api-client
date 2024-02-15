<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductPrices;

use JsonException;

final class PriceTestData
{
    /**
     * @param int $id
     *
     * @return array<string, mixed>
     * @throws JsonException
     */
    public static function price(int $id = 10631): array
    {
        $jsonResponse = <<<JSON
        {
          "id": 10631,
          "public_id": "jZpOKN",
          "variant_id": 16061,
          "name": "First Price",
          "amount": "29.00",
          "cost": "0.00",
          "currency": "usd",
          "duration": null,
          "interval": null,
          "trial_interval": null,
          "trial_duration": null,
          "trial_amount": "0.00",
          "setup_amount": null,
          "self_cancel": true,
          "self_upgrade": true,
          "self_downgrade": true,
          "self_reactivate": true,
          "interval_count": null,
          "payment_type": "one_time",
          "visible": true,
          "compare_at_amount": null,
          "key": null,
          "archived": false,
          "created_at": "2024-01-30T15:38:03.149Z",
          "updated_at": "2024-01-30T15:38:03.149Z"
        }
JSON;

        $data = json_decode($jsonResponse, true, 512, JSON_THROW_ON_ERROR);
        $data['id'] = $id;

        return $data;
    }
}
