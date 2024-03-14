<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\v2\DTO\Endpoint\CreateEndpointDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Endpoint\EndpointDTO;

interface WebhookClientInterface
{
    /**
     * Exchange code with access token
     *
     * @link https://developers.myclickfunnels.com/reference/createwebhooksoutgoingendpoints
     */
    public function createEndpoint(CreateEndpointDTO $createEndpointDTO): EndpointDTO;
}
