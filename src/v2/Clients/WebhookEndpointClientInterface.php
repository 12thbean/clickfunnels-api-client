<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\v2\DTO\Endpoint\CreateEndpointDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Endpoint\EndpointDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Endpoint\UpdateEndpointDTO;

interface WebhookEndpointClientInterface
{
    /**
     * List webhook endpoints for a workspace
     *
     * @return EndpointDTO[]
     * @link https://developers.myclickfunnels.com/reference/listwebhooksoutgoingendpoints
     */
    public function getList(): array;

    /**
     * Retrieve a webhook endpoint for a workspace
     *
     * @link https://developers.myclickfunnels.com/reference/getwebhooksoutgoingendpoints
     */
    public function getById(int $id): EndpointDTO;

    /**
     * Add a new webhook endpoint to a workspace
     *
     * @link https://developers.myclickfunnels.com/reference/createwebhooksoutgoingendpoints
     */
    public function create(CreateEndpointDTO $payload): EndpointDTO;

    /**
     * Update a webhook endpoint for a workspace
     *
     * @link https://developers.myclickfunnels.com/reference/updatewebhooksoutgoingendpoints
     */
    public function update(int $id, UpdateEndpointDTO $payload): EndpointDTO;
}
