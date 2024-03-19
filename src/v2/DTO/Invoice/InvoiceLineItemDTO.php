<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Invoice;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductPrice\ProductPriceDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductVariant\ProductVariantDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\ProductDTO;
use Zendrop\ClickFunnelsApiClient\v2\Enum\InvoiceLineItemFulfillmentStatus;

class InvoiceLineItemDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $publicId = null,
        public readonly ?int $invoiceId = null,
        public readonly null|int|string $externalId = null,
        public readonly null|int|string $externalProductId = null,
        public readonly ?string $paymentType = null, //TODO: enum
        public readonly ?string $description = null,
        public readonly ?float $amount = null,
        public readonly ?int $quantity = null,
        public readonly ?float $discountAmount = null,
        public readonly ?float $stateTaxAmount = null,
        public readonly ?float $countyTaxAmount = null,
        public readonly ?float $cityTaxAmount = null,
        public readonly ?float $districtTaxAmount = null,
        public readonly ?float $stateTaxRate = null,
        public readonly ?float $countyTaxRate = null,
        public readonly ?float $cityTaxRate = null,
        public readonly ?float $districtTaxRate = null,
        public readonly ?string $countryTaxJurisdiction = null,
        public readonly ?string $stateTaxJurisdiction = null,
        public readonly ?string $countyTaxJurisdiction = null,
        public readonly ?string $cityTaxJurisdiction = null,
        public readonly ?string $periodStartAt = null,
        public readonly ?string $periodEndAt = null,
        public readonly ?string $periodNumber = null,
        public readonly ?ProductPriceDTO $productsPrice = null,
        public readonly ?ProductVariantDTO $productsVariant = null,
        public readonly ?InvoiceLineItemFulfillmentStatus $fulfillmentStatus = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
