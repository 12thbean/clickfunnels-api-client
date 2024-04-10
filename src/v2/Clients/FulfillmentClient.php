<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\Http\Packs\HttpMethod;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Fulfillment\CreateFulfillmentDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Fulfillment\FulfillmentDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Fulfillment\UpdateFulfillmentDTO;

class FulfillmentClient extends AbstractClient implements FulfillmentClientInterface
{
    /**
     * {@inheritDoc}
     */
    public function getList(): array
    {
        $response = $this->sendRequest(
            resource: 'fulfillments',
            workspaceRequest: true,
        );
        return FulfillmentDTO::arrayFromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function getById(int $id): FulfillmentDTO
    {
        $response = $this->sendRequest("fulfillments/$id");
        return FulfillmentDTO::fromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function create(CreateFulfillmentDTO $payload): FulfillmentDTO
    {
        $response = $this->sendRequest(
            resource: 'fulfillments',
            method: HttpMethod::POST,
            payload: [
                'fulfillment' => $payload->toArray(),
            ],
            workspaceRequest: true,
        );
        return FulfillmentDTO::fromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function update(int $id, UpdateFulfillmentDTO $payload): FulfillmentDTO
    {
        $response = $this->sendRequest(
            resource: "fulfillments/$id",
            method: HttpMethod::PUT,
            payload: [
                'fulfillment' => $payload->toArray(),
            ],
        );
        return FulfillmentDTO::fromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function cancel(int $id): FulfillmentDTO
    {
        $response = $this->sendRequest(
            resource: "fulfillments/$id/cancel",
            method: HttpMethod::POST,
        );
        return FulfillmentDTO::fromResponse($response->json());
    }
}
