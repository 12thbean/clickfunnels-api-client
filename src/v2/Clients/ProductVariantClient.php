<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\Http\Packs\HttpMethod;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductVariant\CreateProductVariantDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductVariant\ProductVariantDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductVariant\UpdateProductVariantDTO;

class ProductVariantClient extends AbstractClient implements ProductVariantClientInterface
{
    /**
     * {@inheritDoc}
     */
    public function getList(int $productId): array
    {
        $response = $this->sendRequest(resource: "/products/{$productId}/variants");
        return ProductVariantDTO::arrayFromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function getById(int $id): ProductVariantDTO
    {
        $response = $this->sendRequest("/products/variants/{$id}");
        return ProductVariantDTO::fromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function create(int $productId, CreateProductVariantDTO $payload): ProductVariantDTO
    {
        $response = $this->sendRequest(
            resource: "/products/{$productId}/variants",
            method: HttpMethod::POST,
            payload: [
                'products_variant' => $payload->toArray(),
            ],
        );
        return ProductVariantDTO::fromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function update(int $id, UpdateProductVariantDTO $payload): ProductVariantDTO
    {
        $response = $this->sendRequest(
            resource: "/products/variants/{$id}",
            method: HttpMethod::PUT,
            payload: [
                'products_variant' => $payload->toArray(),
            ],
        );
        return ProductVariantDTO::fromResponse($response->json());
    }
}
