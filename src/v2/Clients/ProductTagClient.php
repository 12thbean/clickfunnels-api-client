<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\Http\Packs\HttpMethod;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductTags\CreateTagDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductTags\ProductTagDTO;

class ProductTagClient extends AbstractClient implements ProductTagClientInterface
{
    /**
     * {@inheritDoc}
     */
    public function create(CreateTagDTO $payload): ProductTagDTO
    {
        $response = $this->sendRequest(
            resource: 'products/tags',
            method: HttpMethod::POST,
            payload: [
                'products_tag' => $payload->toArray(),
            ],
        );
        return ProductTagDTO::fromResponse($response->json());
    }
}
