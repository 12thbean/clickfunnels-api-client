<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Illuminate\Http\Client\Response;
use Zendrop\ClickFunnelsApiClient\Http\Packs\HttpMethod;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\ProductDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductCollection\CreateProductCollectionDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductCollection\ProductCollectionDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductCollection\UpdateProductCollectionDTO;
use Zendrop\ClickFunnelsApiClient\v2\Pagination\CursorPaginator;
use Zendrop\ClickFunnelsApiClient\v2\Pagination\HeaderCursor;
use Zendrop\ClickFunnelsApiClient\v2\Pagination\RequestContextDTO;

class ProductCollectionClient extends AbstractClient implements ProductCollectionClientInterface
{
    /**
     * {@inheritDoc}
     */
    public function getList(?RequestContextDTO $context = null, ?int $after = null): iterable
    {
        $cursor = new HeaderCursor($after, $context);

        return new CursorPaginator(
            $this->getListRequest(...),
            fn (Response $response) => ProductCollectionDTO::arrayFromResponse($response->json()),
            $cursor,
        );
    }

    /**
     * {@inheritDoc}
     */
    public function create(CreateProductCollectionDTO $payload): ProductCollectionDTO
    {
        $response = $this->sendRequest(
            resource: '/products/collections',
            method: HttpMethod::POST,
            payload: [
                'products_collection' => $payload->toArray(),
            ],
            workspaceRequest: true,
        );
        return ProductCollectionDTO::fromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function getById(int $id): ProductCollectionDTO
    {
        $response = $this->sendRequest("/products/collections/{$id}");
        return ProductCollectionDTO::fromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function update(int $id, UpdateProductCollectionDTO $payload): ProductCollectionDTO
    {
        $response = $this->sendRequest(
            resource: "/products/collections/{$id}",
            method: HttpMethod::PUT,
            payload: [
                'products_collection' => $payload->toArray(),
            ],
        );
        return ProductCollectionDTO::fromResponse($response->json());
    }

    private function getListRequest(HeaderCursor $cursor): Response
    {
        return $this->sendRequest(
            resource: '/products/collections',
            payload: [
                'after' => $cursor->getNext(),
            ],
            workspaceRequest: true,
        );
    }
}
