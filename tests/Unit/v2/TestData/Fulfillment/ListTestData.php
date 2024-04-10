<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\Fulfillment;

use JsonException;

final class ListTestData
{
    /**
     * @return array<int, array<string, mixed>>
     * @throws JsonException
     */
    public static function list(): array
    {
        $jsonResponse = <<<JSON
[
    {
        "id": 1,
        "public_id": "test1",
        "workspace_id": 1,
        "contact_id": 1,
        "status": "fulfilled",
        "tracking_url": "test1",
        "shipping_provider": "provider",
        "tracking_code": "test1",
        "location_id": 1,
        "fulfillment_number": 1,
        "created_at": "2024-04-08T15:15:49.787Z",
        "updated_at": "2024-04-08T15:15:49.787Z",
        "included_invoices_line_items": [
            {
                "id": 1,
                "public_id": "test1",
                "fulfillment_id": 1,
                "quantity": 2,
                "invoices_line_item_id": 1
            }
        ]
    },
    {
        "id": 2,
        "public_id": "test2",
        "workspace_id": 1,
        "contact_id": 1,
        "status": "fulfilled",
        "tracking_url": "test2",
        "shipping_provider": "provider",
        "tracking_code": "test2",
        "location_id": 1,
        "fulfillment_number": 2,
        "created_at": "2024-04-08T15:15:49.787Z",
        "updated_at": "2024-04-08T15:15:49.787Z",
        "included_invoices_line_items": [
            {
                "id": 2,
                "public_id": "test2",
                "fulfillment_id": 2,
                "quantity": 3,
                "invoices_line_item_id": 2
            }
        ]
    }
]
JSON;

        return json_decode($jsonResponse, true, 512, JSON_THROW_ON_ERROR);
    }
}
