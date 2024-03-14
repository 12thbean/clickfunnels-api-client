<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Illuminate\Http\Client\Response;
use Zendrop\ClickFunnelsApiClient\Http\Packs\HttpCode;
use Zendrop\ClickFunnelsApiClient\Http\Packs\HttpMethod;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Tag\TagDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Tag\CreateTagDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Tag\UpdateTagDTO;
use Zendrop\ClickFunnelsApiClient\v2\Pagination\CursorPaginator;
use Zendrop\ClickFunnelsApiClient\v2\Pagination\HeaderCursor;
use Zendrop\ClickFunnelsApiClient\v2\Pagination\RequestContextDTO;

class ProductTagClient extends AbstractClient implements ProductTagClientInterface
{
    /**
     * {@inheritDoc}
     */
    public function getList(?RequestContextDTO $context = null, ?int $after = null): iterable
    {
        $cursor = new HeaderCursor($after, $context);

        return new CursorPaginator(
            $this->getListRequest(...),
            fn (Response $response) => TagDTO::arrayFromResponse($response->json()),
            $cursor,
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getById(int $id): TagDTO
    {
        $response = $this->sendRequest("/products/tags/{$id}");
        return TagDTO::fromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function create(CreateTagDTO $payload): TagDTO
    {
        $response = $this->sendRequest(
            resource: 'products/tags',
            method: HttpMethod::POST,
            payload: [
                'products_tag' => $payload->toArray(),
            ],
            workspaceRequest: true,
        );
        return TagDTO::fromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function update(int $id, UpdateTagDTO $payload): TagDTO
    {
        $response = $this->sendRequest(
            resource: "/products/tags/{$id}",
            method: HttpMethod::PUT,
            payload: [
                'products_tag' => $payload->toArray(),
            ],
        );
        return TagDTO::fromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function delete(int $id): bool
    {
        $response = $this->sendRequest(
            resource: "/products/tags/{$id}",
            method: HttpMethod::DELETE,
        );

        return $response->status() === HttpCode::HTTP_NO_CONTENT->value;
    }

    private function getListRequest(HeaderCursor $cursor): Response
    {
        return $this->sendRequest(
            resource: '/products/tags',
            payload: [
                'after' => $cursor->getNext(),
            ],
            workspaceRequest: true,
        );
    }
}
