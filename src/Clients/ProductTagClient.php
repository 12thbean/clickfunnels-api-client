<?php

namespace Zendrop\ClickFunnelsApiClient\Clients;

use Zendrop\ClickFunnelsApiClient\DTO\ProductTags\CreateTagDTO;
use Zendrop\ClickFunnelsApiClient\DTO\ProductTags\ProductTagDTO;

class ProductTagClient extends AbstractClient implements ProductTagClientInterface
{
    /**
     * {@inheritDoc}
     */
    public function create(CreateTagDTO $payload): ProductTagDTO
    {
        $response = $this->sendRequest(
            resource: 'products/tags',
            method: self::POST,
            payload: [
                'products_tag' => $payload->toArray(),
            ],
        );
        return ProductTagDTO::fromResponse($response->json());
    }
}
