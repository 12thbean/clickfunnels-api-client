<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\WebhookEndpoints;

use JsonException;

final class WebhookEndpointTestData
{
    /**
     * @return array<string, mixed>
     * @throws JsonException
     */
    public static function webhookEndpoint(int $id = 1): array
    {
        $jsonResponse = <<<JSON
            {
                "id": 1,
                "workspace_id": 1,
                "url": "fake_url",
                "name": "Product created",
                "event_type_ids": [
                    "product.created"
                ],
                "created_at": "2024-03-14T10:43:55.390Z",
                "updated_at": "2024-03-14T10:43:55.390Z"
            }
JSON;

        $data = json_decode($jsonResponse, true, 512, JSON_THROW_ON_ERROR);
        $data['id'] = $id;

        return $data;
    }
}
