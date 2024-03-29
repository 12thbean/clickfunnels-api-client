<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\Http\Packs\HttpMethod;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductPrice\CreateProductPriceDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductPrice\ProductPriceDTO;

class ProductPriceClient extends AbstractClient implements ProductPriceClientInterface
{
    /**
     * {@inheritDoc}
     */
    public function getList(int $productId): array
    {
        $response = $this->sendRequest("/products/{$productId}/prices");
        return ProductPriceDTO::arrayFromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function getById(int $id): ProductPriceDTO
    {
        $response = $this->sendRequest("/products/prices/{$id}");
        return ProductPriceDTO::fromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function create(int $variantId, CreateProductPriceDTO $payload): ProductPriceDTO
    {
        $response = $this->sendRequest(
            resource: "/products/variants/{$variantId}/prices",
            method: HttpMethod::POST,
            payload: [
                'products_price' => $payload->toArray(),
            ],
        );
        return ProductPriceDTO::fromResponse($response->json());
    }
}
