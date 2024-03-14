<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\WebhookEndpoints;

use JsonException;

final class WebhookEndpointListTestData
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
        "workspace_id": 1,
        "url": "fake_url",
        "name": "Example Endpoint use API",
        "event_type_ids": [
            "subscription.modified"
        ],
        "created_at": "2024-02-01T20:44:49.274Z",
        "updated_at": "2024-02-01T20:44:49.274Z"
    },
    {
        "id": 2,
        "workspace_id": 1,
        "url": "fake_url",
        "name": "Product created",
        "event_type_ids": [
            "product.created"
        ],
        "created_at": "2024-03-12T09:44:33.667Z",
        "updated_at": "2024-03-12T09:44:33.667Z"
    }
]
JSON;

        return json_decode($jsonResponse, true, 512, JSON_THROW_ON_ERROR);
    }
}
