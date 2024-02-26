<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\Order;

use JsonException;

final class OrderTestData
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
            "id": 19758,
            "public_id": "jldODj",
            "order_number": "#1001",
            "workspace_id": 1718,
            "contact_id": 179794,
            "total_amount": "100.00",
            "currency": "usd",
            "origination_channel_id": 27,
            "origination_channel_type": "User",
            "shipping_address_first_name": null,
            "shipping_address_last_name": null,
            "shipping_address_organization_name": "",
            "shipping_address_phone_number": null,
            "shipping_address_street_one": "708 East Chandler Avenue",
            "shipping_address_street_two": "",
            "shipping_address_city": "Evansville",
            "shipping_address_region": "IN",
            "shipping_address_country": "US",
            "shipping_address_postal_code": "47713",
            "billing_address_street_one": null,
            "billing_address_street_two": null,
            "billing_address_city": null,
            "billing_address_region": null,
            "billing_address_country": null,
            "billing_address_postal_code": null,
            "page_id": null,
            "notes": null,
            "in_trial": false,
            "billing_status": "paid",
            "service_status": "completed",
            "order_type": "one-time-order",
            "next_charge_at": null,
            "tax_amount": "0.00",
            "trial_end_at": null,
            "billing_payment_method_id": null,
            "funnel_name": null,
            "tag_ids": [],
            "discount_ids": [],
            "activated_at": "2024-01-31T21:40:36.000Z",
            "created_at": "2024-01-31T21:39:45.703Z",
            "updated_at": "2024-01-31T21:40:38.671Z",
            "phone_number": null,
            "page_name": null,
            "origination_channel_name": "William Brant",
            "order_page": null,
            "contact": {
              "id": 179794,
              "public_id": "jaNYlX",
              "workspace_id": 1718,
              "anonymous": 0,
              "email_address": "williambrant@clickfunnels.com",
              "first_name": null,
              "last_name": null,
              "phone_number": null,
              "time_zone": null,
              "uuid": "71ebb2e0-ba2b-4601-a263-6b19fa549d33",
              "unsubscribed_at": null,
              "last_notification_email_sent_at": null,
              "fb_url": null,
              "twitter_url": null,
              "instagram_url": null,
              "linkedin_url": null,
              "website_url": null,
              "created_at": "2024-01-31T17:54:21.443Z",
              "updated_at": "2024-01-31T17:54:21.443Z",
              "tags": [],
              "custom_attributes": {}
            },
            "contact_groups": [
              {
                "id": 1693,
                "public_id": "eQwMWj",
                "name": "Default Group"
              }
            ],
            "workspace": {
              "id": 1718,
              "public_id": "JGBnNe",
              "team_id": 1691,
              "name": "Zendrop Development",
              "subdomain": "myworkspace0b2f2",
              "created_at": "2024-01-30T15:37:30.864Z",
              "updated_at": "2024-02-01T20:44:49.278Z"
            },
            "segments": [],
            "line_items": [
              {
                "id": 20504,
                "public_id": "jrrVoj",
                "order_id": 19758,
                "quantity": 1,
                "prorated": null,
                "created_at": "2024-01-31T21:39:45.722Z",
                "updated_at": "2024-01-31T21:39:45.722Z",
                "original_product": {
                  "id": 9168,
                  "public_id": "jeevMj",
                  "name": "Test product name"
                },
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
            ],
            "previous_line_item": null
          },
          {
            "id": 19807,
            "public_id": "JDXvBJ",
            "order_number": "#1002",
            "workspace_id": 1718,
            "contact_id": 179791,
            "total_amount": "200.00",
            "currency": "usd",
            "origination_channel_id": 3475,
            "origination_channel_type": "User",
            "shipping_address_first_name": null,
            "shipping_address_last_name": null,
            "shipping_address_organization_name": "Raman Slauta",
            "shipping_address_phone_number": null,
            "shipping_address_street_one": "Jerzego Zaruby 11, ap 106",
            "shipping_address_street_two": "",
            "shipping_address_city": "Warszawa",
            "shipping_address_region": "",
            "shipping_address_country": "PL",
            "shipping_address_postal_code": "02-796",
            "billing_address_street_one": null,
            "billing_address_street_two": null,
            "billing_address_city": null,
            "billing_address_region": null,
            "billing_address_country": null,
            "billing_address_postal_code": null,
            "page_id": null,
            "notes": null,
            "in_trial": false,
            "billing_status": "paid",
            "service_status": "completed",
            "order_type": "one-time-order",
            "next_charge_at": null,
            "tax_amount": "0.00",
            "trial_end_at": null,
            "billing_payment_method_id": null,
            "funnel_name": null,
            "tag_ids": [],
            "discount_ids": [],
            "activated_at": null,
            "created_at": "2024-02-01T20:27:20.043Z",
            "updated_at": "2024-02-01T20:28:05.950Z",
            "phone_number": null,
            "page_name": null,
            "origination_channel_name": "Roman Slauta",
            "order_page": null,
            "contact": {
              "id": 179791,
              "public_id": "jpAnMa",
              "workspace_id": 1718,
              "anonymous": 0,
              "email_address": "roman@zendrop.com",
              "first_name": null,
              "last_name": null,
              "phone_number": null,
              "time_zone": null,
              "uuid": "7306b399-6930-4e7d-bc8f-898fcdba61b6",
              "unsubscribed_at": null,
              "last_notification_email_sent_at": null,
              "fb_url": null,
              "twitter_url": null,
              "instagram_url": null,
              "linkedin_url": null,
              "website_url": null,
              "created_at": "2024-01-31T17:18:32.992Z",
              "updated_at": "2024-01-31T17:18:32.992Z",
              "tags": [],
              "custom_attributes": {}
            },
            "contact_groups": [
              {
                "id": 1693,
                "public_id": "eQwMWj",
                "name": "Default Group"
              }
            ],
            "workspace": {
              "id": 1718,
              "public_id": "JGBnNe",
              "team_id": 1691,
              "name": "Zendrop Development",
              "subdomain": "myworkspace0b2f2",
              "created_at": "2024-01-30T15:37:30.864Z",
              "updated_at": "2024-02-01T20:44:49.278Z"
            },
            "segments": [],
            "line_items": [
              {
                "id": 20555,
                "public_id": "ebdVYJ",
                "order_id": 19807,
                "quantity": 1,
                "prorated": null,
                "created_at": "2024-02-01T20:27:20.067Z",
                "updated_at": "2024-02-01T20:27:20.067Z",
                "original_product": {
                  "id": 9168,
                  "public_id": "jeevMj",
                  "name": "Test product name"
                },
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
                  "id": 16101,
                  "public_id": "NvbGMN",
                  "name": "Test product name (Red)",
                  "description": null,
                  "sku": "SKU1"
                }
              },
              {
                "id": 20556,
                "public_id": "eyKLkJ",
                "order_id": 19807,
                "quantity": 1,
                "prorated": null,
                "created_at": "2024-02-01T20:27:20.070Z",
                "updated_at": "2024-02-01T20:27:20.070Z",
                "original_product": {
                  "id": 9168,
                  "public_id": "jeevMj",
                  "name": "Test product name"
                },
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
            ],
            "previous_line_item": null
          }
        ]
JSON;

        return json_decode($jsonResponse, true, 512, JSON_THROW_ON_ERROR);
    }
}
