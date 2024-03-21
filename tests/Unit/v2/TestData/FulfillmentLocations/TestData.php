<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\FulfillmentLocations;

use JsonException;

final class TestData
{
    /**
     * @return array<string, mixed>
     * @throws JsonException
     */
    public static function fulfillmentLocation(int $id = 1): array
    {
        $jsonResponse = <<<JSON
            {
                "id": 1,
                "public_id": "test1",
                "workspace_id": 1,
                "name": "Default location",
                "address_name": "Test",
                "email_address": "test@te.te",
                "phone_number": "555-66-777",
                "sort_order": 0,
                "external_app": true,
                "created_at": "2024-03-18T16:44:11.448Z",
                "updated_at": "2024-03-18T16:44:11.448Z",
                "address": null
            }
JSON;

        $data = json_decode($jsonResponse, true, 512, JSON_THROW_ON_ERROR);
        $data['id'] = $id;

        return $data;
    }
}
