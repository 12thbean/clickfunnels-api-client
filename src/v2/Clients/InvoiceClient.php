<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Illuminate\Http\Client\Response;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Invoice\InvoiceDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Invoice\ListInvoicesRequestContextDTO;
use Zendrop\ClickFunnelsApiClient\v2\Pagination\CursorPaginator;
use Zendrop\ClickFunnelsApiClient\v2\Pagination\HeaderCursor;

class InvoiceClient extends AbstractClient
{
    /**
     * @return CursorPaginator<InvoiceDTO>
     */
    public function getList(
        ListInvoicesRequestContextDTO $listInvoicesRequestContextDTO,
        ?int $after = null,
    ): CursorPaginator {
        $cursor = new HeaderCursor($after, $listInvoicesRequestContextDTO);

        return new CursorPaginator(
            // @phpstan-ignore-next-line
            fn (HeaderCursor $cursor) => $this->getListRequest($cursor->requestContextDTO, $cursor->getNext()),
            fn (Response $response) => InvoiceDTO::arrayFromResponse($response->json()),
            $cursor,
        );
    }

    public function get(int $id): InvoiceDTO
    {
        $response = $this->sendRequest("/orders/invoices/{$id}");
        return InvoiceDTO::fromResponse($response->json());
    }

    private function getListRequest(
        ListInvoicesRequestContextDTO $requestContextDTO,
        ?int $after = null,
    ): Response {
        $orderId = $requestContextDTO->orderId;
        $payload = [
            'after' => $after,
            'sort_order' => $requestContextDTO->sortOrder,
        ];

        return $this->sendRequest(
            resource: "/orders/$orderId/invoices",
            payload: array_filter(
                $payload,
                fn ($key) => isset($payload[$key]),
                ARRAY_FILTER_USE_KEY
            ),
        );
    }
}
