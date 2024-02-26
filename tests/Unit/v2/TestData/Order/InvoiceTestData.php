<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\Order;

use JsonException;

final class InvoiceTestData
{
  /**
   * @return array<int, array<string, mixed>>
   * @throws JsonException
   */
  public static function getList(): array
  {
    $jsonResponse = <<<JSON
        [
          {
            "id": 46282,
            "public_id": "egDADR",
            "order_id": 19758,
            "status": "paid",
            "due_amount": "0.00",
            "total_amount": "100.00",
            "subtotal_amount": "100.00",
            "tax_amount": "0.00",
            "shipping_amount": "0.00",
            "discount_amount": "0.00",
            "currency": "USD",
            "issued_at": "2024-01-31T21:40:32.000Z",
            "due_at": "2024-01-31T21:40:32.000Z",
            "paid_at": "2024-01-31T21:40:36.000Z",
            "invoice_type": "one_time_sale",
            "created_at": "2024-01-31T21:40:33.386Z",
            "updated_at": "2024-01-31T21:40:38.063Z",
            "line_items": [
              {
                "id": 47052,
                "public_id": "JGBVaX",
                "invoice_id": 46282,
                "external_id": "ii_01HNGQETFGP7N0BN3AZNX4B1C0",
                "payment_type": "debit",
                "description": "Test product name (Blue) $100.00",
                "amount": "100.0",
                "quantity": 1,
                "external_product_id": "products_variant_16102",
                "discount_amount": null,
                "state_tax_amount": null,
                "county_tax_amount": null,
                "city_tax_amount": null,
                "district_tax_amount": null,
                "state_tax_rate": null,
                "county_tax_rate": null,
                "city_tax_rate": null,
                "district_tax_rate": null,
                "country_tax_jurisdiction": null,
                "state_tax_jurisdiction": null,
                "county_tax_jurisdiction": null,
                "city_tax_jurisdiction": null,
                "period_start_at": null,
                "period_end_at": null,
                "period_number": null,
                "created_at": "2024-01-31T21:40:37.787Z",
                "updated_at": "2024-01-31T21:40:37.787Z",
                "products_price": {
                  "id": 10664,
                  "public_id": "JLkBAN",
                  "amount": "100.0",
                  "currency": "usd",
                  "duration": null,
                  "interval": null,
                  "interval_count": null
                },
                "products_variant": {
                  "id": 16102,
                  "public_id": "NMgmwj",
                  "name": "Test product name (Blue)",
                  "description": null,
                  "sku": null
                }
              }
            ]
          }
        ]
        JSON;

    return json_decode($jsonResponse, true, 512, JSON_THROW_ON_ERROR);
  }
}
