<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Illuminate\Http\Client\Response;
use Zendrop\ClickFunnelsApiClient\Http\Packs\HttpCode;
use Zendrop\ClickFunnelsApiClient\Http\Packs\HttpMethod;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductImage\CreateImageDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductImage\ProductImageDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductImage\UpdateImageDTO;
use Zendrop\ClickFunnelsApiClient\v2\Pagination\CursorPaginator;
use Zendrop\ClickFunnelsApiClient\v2\Pagination\HeaderCursor;
use Zendrop\ClickFunnelsApiClient\v2\Pagination\RequestContextDTO;

class ProductImageClient extends AbstractClient implements ProductImageClientInterface
{
    /**
     * {@inheritDoc}
     */
    public function getList(?RequestContextDTO $context = null, ?int $after = null): iterable
    {
        $cursor = new HeaderCursor($after, $context);

        return new CursorPaginator(
            $this->getListRequest(...),
            fn (Response $response) => ProductImageDTO::arrayFromResponse($response->json()),
            $cursor,
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getById(int $id): ProductImageDTO
    {
        $response = $this->sendRequest("/images/{$id}");
        return ProductImageDTO::fromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function create(CreateImageDTO $payload): ProductImageDTO
    {
        $response = $this->sendRequest(
            resource: '/images',
            method: HttpMethod::POST,
            payload: [
                'image' => $payload->toArray(),
            ],
            workspaceRequest: true,
        );
        return ProductImageDTO::fromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function update(int $id, UpdateImageDTO $payload): ProductImageDTO
    {
        $response = $this->sendRequest(
            resource: "/images/{$id}",
            method: HttpMethod::PUT,
            payload: [
                'image' => $payload->toArray(),
            ],
        );
        return ProductImageDTO::fromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $id): bool
    {
        $response = $this->sendRequest(
            "/images/{$id}",
            HttpMethod::DELETE,
        );
        return $response->status() === HttpCode::HTTP_NO_CONTENT->value;
    }

    private function getListRequest(HeaderCursor $cursor): Response
    {
        return $this->sendRequest(
            resource: '/images',
            payload: [
                'after' => $cursor->getNext(),
            ],
            workspaceRequest: true,
        );
    }
}
