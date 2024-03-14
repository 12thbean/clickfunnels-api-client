<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\Http\Packs\HttpMethod;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Endpoint\CreateEndpointDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Endpoint\EndpointDTO;

class WebhookClient extends AbstractClient implements WebhookClientInterface
{
    /**
     * {@inheritDoc}
     */
    public function createEndpoint(CreateEndpointDTO $payload): EndpointDTO
    {
        $response = $this->sendRequest(
            resource: '/webhooks/outgoing/endpoints',
            method: HttpMethod::POST,
            payload: [
                'webhooks_outgoing_endpoint' => $payload->toArray(),
            ],
            workspaceRequest: true,
        );
        return EndpointDTO::fromResponse($response->json());
    }
}
