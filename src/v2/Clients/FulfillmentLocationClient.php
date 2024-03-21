<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\Http\Packs\HttpCode;
use Zendrop\ClickFunnelsApiClient\Http\Packs\HttpMethod;
use Zendrop\ClickFunnelsApiClient\v2\DTO\FulfillmentLocation\CreateFulfillmentLocationDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\FulfillmentLocation\FulfillmentLocationDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\FulfillmentLocation\UpdateFulfillmentLocationDTO;

class FulfillmentLocationClient extends AbstractClient implements FulfillmentLocationClientInterface
{
    /**
     * {@inheritDoc}
     */
    public function getList(): array
    {
        $response = $this->sendRequest(
            resource: 'fulfillments/locations',
            workspaceRequest: true,
        );
        return FulfillmentLocationDTO::arrayFromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function getById(int $id): FulfillmentLocationDTO
    {
        $response = $this->sendRequest("fulfillments/locations/$id");
        return FulfillmentLocationDTO::fromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function create(CreateFulfillmentLocationDTO $payload): FulfillmentLocationDTO
    {
        $response = $this->sendRequest(
            resource: 'fulfillments/locations',
            method: HttpMethod::POST,
            payload: [
                'fulfillments_location' => $payload->toArray(),
            ],
            workspaceRequest: true,
        );
        return FulfillmentLocationDTO::fromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function update(int $id, UpdateFulfillmentLocationDTO $payload): FulfillmentLocationDTO
    {
        $response = $this->sendRequest(
            resource: "fulfillments/locations/$id",
            method: HttpMethod::PUT,
            payload: [
                'fulfillments_location' => $payload->toArray(),
            ],
        );
        return FulfillmentLocationDTO::fromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function delete(int $id): bool
    {
        $response = $this->sendRequest(
            resource: "fulfillments/locations/$id",
            method: HttpMethod::DELETE,
        );

        return $response->status() === HttpCode::HTTP_NO_CONTENT->value;
    }
}
