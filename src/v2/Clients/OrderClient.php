<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Illuminate\Http\Client\Response;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Order\OrderDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Order\ListOrdersRequestContextDTO;
use Zendrop\ClickFunnelsApiClient\v2\Pagination\CursorPaginator;
use Zendrop\ClickFunnelsApiClient\v2\Pagination\HeaderCursor;

class OrderClient extends AbstractClient
{
    /**
     * @return CursorPaginator<OrderDTO>
     */
    public function getList(?HeaderCursor $headerCursor = null): CursorPaginator
    {
        $cursor = $headerCursor ?? new HeaderCursor();

        return new CursorPaginator(
            // @phpstan-ignore-next-line
            fn (HeaderCursor $cursor) => $this->getListRequest($cursor->requestContextDTO, $cursor->getNext()),
            fn (Response $response) => OrderDTO::arrayFromResponse($response->json()),
            $cursor,
        );
    }

    public function getById(int $id): OrderDTO
    {
        $response = $this->sendRequest("/orders/{$id}");
        return OrderDTO::fromResponse($response->json());
    }

    private function getListRequest(
        ?ListOrdersRequestContextDTO $listOrdersRequestContextDTO = null,
        ?int $after = null,
    ): Response {
        $context = $listOrdersRequestContextDTO ?? new ListOrdersRequestContextDTO();
        $payload = [
            'after' => $after,
            'sort_order' => $context->sortOrder,
            'filter' => $context->filter?->toArray(),
        ];

        return $this->sendRequest(
            resource: '/orders',
            payload: array_filter(
                $payload,
                fn ($key) => isset($payload[$key]),
                ARRAY_FILTER_USE_KEY
            ),
            workspaceRequest: true
        );
    }
}
