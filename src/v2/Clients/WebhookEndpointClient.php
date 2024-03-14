<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\Http\Packs\HttpMethod;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Endpoint\CreateEndpointDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Endpoint\EndpointDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Endpoint\UpdateEndpointDTO;

class WebhookEndpointClient extends AbstractClient implements WebhookEndpointClientInterface
{
    /**
     * {@inheritDoc}
     */
    public function getList(): array
    {
        $response = $this->sendRequest('/webhooks/outgoing/endpoints');
        return EndpointDTO::arrayFromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function getById(int $id): EndpointDTO
    {
        $response = $this->sendRequest("/webhooks/outgoing/endpoints/$id");
        return EndpointDTO::fromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function create(CreateEndpointDTO $payload): EndpointDTO
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

    /**
     * {@inheritDoc}
     */
    public function update(int $id, UpdateEndpointDTO $payload): EndpointDTO
    {
        $response = $this->sendRequest(
            resource: "/webhooks/outgoing/endpoints/$id",
            method: HttpMethod::PUT,
            payload: [
                'webhooks_outgoing_endpoint' => $payload->toArray(),
            ],
        );
        return EndpointDTO::fromResponse($response->json());
    }
}
