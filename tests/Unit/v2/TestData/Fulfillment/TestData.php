<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\Fulfillment;

use JsonException;

final class TestData
{
    /**
     * @return array<string, mixed>
     * @throws JsonException
     */
    public static function fulfillment(int $id = 1): array
    {
        $jsonResponse = <<<JSON
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
            }
JSON;

        $data = json_decode($jsonResponse, true, 512, JSON_THROW_ON_ERROR);
        $data['id'] = $id;

        return $data;
    }
}
