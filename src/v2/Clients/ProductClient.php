<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\Http\Packs\HttpMethod;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Products\CreateProductDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Products\ProductDTO;

class ProductClient extends AbstractClient implements ProductClientInterface
{
    /**
     * {@inheritDoc}
     */
    public function getList(): array
    {
        $response = $this->sendRequest(resource: '/products', workspaceRequest: true);
        return ProductDTO::arrayFromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function getById(int $id): ProductDTO
    {
        $response = $this->sendRequest("/products/{$id}");
        return ProductDTO::fromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function create(CreateProductDTO $payload): ProductDTO
    {
        $response = $this->sendRequest(
            resource: '/products',
            method: HttpMethod::POST,
            payload: [
                'product' => $payload->toArray(),
            ],
            workspaceRequest: true,
        );
        return ProductDTO::fromResponse($response->json());
    }
}
