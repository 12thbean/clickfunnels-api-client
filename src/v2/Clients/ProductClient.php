<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Illuminate\Http\Client\Response;
use Zendrop\ClickFunnelsApiClient\Http\Packs\HttpMethod;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\CreateProductDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\ProductDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\UpdateProductDTO;
use Zendrop\ClickFunnelsApiClient\v2\Pagination\CursorPaginator;
use Zendrop\ClickFunnelsApiClient\v2\Pagination\HeaderCursor;
use Zendrop\ClickFunnelsApiClient\v2\Pagination\RequestContextDTO;

class ProductClient extends AbstractClient implements ProductClientInterface
{
    /**
     * {@inheritDoc}
     */
    public function getList(?RequestContextDTO $context = null, ?int $after = null): iterable
    {
        $cursor = new HeaderCursor($after, $context);

        return new CursorPaginator(
            $this->getListRequest(...),
            fn (Response $response) => ProductDTO::arrayFromResponse($response->json()),
            $cursor,
        );
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

    /**
     * {@inheritDoc}
     */
    public function update(int $id, UpdateProductDTO $payload): ProductDTO
    {
        $response = $this->sendRequest(
            resource: "/products/{$id}",
            method: HttpMethod::PUT,
            payload: [
                'product' => $payload->toArray(),
            ],
        );
        return ProductDTO::fromResponse($response->json());
    }

    private function getListRequest(HeaderCursor $cursor): Response
    {
        return $this->sendRequest(
            resource: '/products',
            payload: [
                'after' => $cursor->getNext(),
            ],
        );
    }
}
