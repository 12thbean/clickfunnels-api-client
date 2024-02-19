<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\Http\Packs\HttpMethod;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Tag\TagDTO;

class ProductTagClient extends AbstractClient implements ProductTagClientInterface
{
    /**
     * {@inheritDoc}
     */
    public function create(TagDTO $payload): TagDTO
    {
        $response = $this->sendRequest(
            resource: 'products/tags',
            method: HttpMethod::POST,
            payload: [
                'products_tag' => $payload->toArray(),
            ],
        );
        return TagDTO::fromResponse($response->json());
    }
}
