<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Order;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Contact\ContactDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Contact\ContactGroupDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Pagination\PageDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Workspace\WorkspaceDTO;
use Zendrop\ClickFunnelsApiClient\v2\Enum\OrderBillingStatus;
use Zendrop\Data\ArrayOf;

class OrderDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly int $workspaceId,
        public readonly int $contactId,
        public readonly string $currency,
        public readonly int $originationChannelId,
        public readonly ContactDTO $contact,
        public readonly WorkspaceDTO $workspace,
        public readonly ?string $publicId = null,
        public readonly ?string $orderNumber = null,
        public readonly ?string $totalAmount = null,
        public readonly ?string $originationChannelType = null,
        public readonly ?string $shippingAddressFirstName = null,
        public readonly ?string $shippingAddressLastName = null,
        public readonly ?string $shippingAddressOrganizationName = null,
        public readonly ?string $shippingAddressPhoneNumber = null,
        public readonly ?string $shippingAddressStreetOne = null,
        public readonly ?string $shippingAddressStreetTwo = null,
        public readonly ?string $shippingAddressCity = null,
        public readonly ?string $shippingAddressRegion = null,
        public readonly ?string $shippingAddressCountry = null,
        public readonly ?string $shippingAddressPostalCode = null,
        public readonly ?string $billingAddressStreetOne = null,
        public readonly ?string $billingAddressStreetTwo = null,
        public readonly ?string $billingAddressCity = null,
        public readonly ?string $billingAddressRegion = null,
        public readonly ?string $billingAddressCountry = null,
        public readonly ?string $billingAddressPostalCode = null,
        public readonly ?int $pageId = null,
        public readonly ?string $notes = null,
        public readonly ?bool $inTrial = null,
        public readonly ?OrderBillingStatus $billingStatus = null,
        public readonly ?string $serviceStatus = null,
        public readonly ?string $orderType = null,
        public readonly ?string $nextChargeAt = null,
        public readonly ?string $taxAmount = null,
        public readonly ?string $trialEndAt = null,
        public readonly ?string $billingPaymentMethodId = null,
        public readonly ?string $funnelName = null,
        public readonly ?string $activatedAt = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
        public readonly ?string $phoneNumber = null,
        public readonly ?string $pageName = null,
        public readonly ?string $originationChannelName = null,
        public readonly ?string $previousLineItem = null,
        public readonly ?PageDTO $orderPage = null,
        /** @var array<int,int>|null */
        public readonly ?array $tagIds = null,
        /** @var array<int,int>|null */
        public readonly ?array $discountIds = null,
        /** @var array<int,ContactGroupDTO> */
        public readonly ?array $contactGroups = null,
        /** @var array<int,SegmentDTO>|null */
        public readonly ?array $segments = null,
        /** @var array<int,LineItemDTO>|null */
        #[ArrayOf(LineItemDTO::class)]
        public readonly ?array $lineItems = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
