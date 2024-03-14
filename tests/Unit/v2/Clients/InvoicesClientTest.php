<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\Order\InvoiceTestData;
use Zendrop\ClickFunnelsApiClient\v2\Clients\InvoiceClient;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Invoice\InvoiceDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Invoice\ListInvoicesRequestContextDTO;

final class InvoicesClientTest extends ClientTestCase
{
    private InvoiceClient $invoiceClient;

    protected function setUp(): void
    {
        parent::setUp();
        $this->invoiceClient = new InvoiceClient(...$this->clientData);
    }

    public function testGetAllOrderInvoices(): void
    {
        $fakeResponseData = InvoiceTestData::list();
        $testOrderId = $fakeResponseData[0]['order_id'];

        Http::fake([
            '/orders/*/invoices*' => Http::response($fakeResponseData),
        ]);

        $paginator = $this->invoiceClient->getListPaginator(
            new ListInvoicesRequestContextDTO($testOrderId)
        );

        foreach ($paginator->getIterator() as $invoice) {
            $this->assertInstanceOf(InvoiceDTO::class, $invoice);
        }
    }
}
