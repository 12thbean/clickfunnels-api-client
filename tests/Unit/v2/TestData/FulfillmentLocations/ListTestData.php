<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\FulfillmentLocations;

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
        "name": "Default location",
        "address_name": "Test",
        "email_address": "test@te.te",
        "phone_number": null,
        "sort_order": 0,
        "external_app": true,
        "created_at": "2024-01-30T15:38:03.028Z",
        "updated_at": "2024-01-30T15:38:03.028Z",
        "address": null
    },
    {
        "id": 2,
        "public_id": "test2",
        "workspace_id": 1,
        "name": "Test location",
        "address_name": "Test",
        "email_address": "test@te.te",
        "phone_number": "555-66-777",
        "sort_order": 1,
        "external_app": false,
        "created_at": "2024-03-18T16:30:49.121Z",
        "updated_at": "2024-03-18T16:30:49.121Z",
        "address": {
            "address_one": "test",
            "address_two": "test2",
            "city": "LA",
            "region": "California",
            "country": "US",
            "postal_code": "12323"
        }
    }
]
JSON;

        return json_decode($jsonResponse, true, 512, JSON_THROW_ON_ERROR);
    }
}
