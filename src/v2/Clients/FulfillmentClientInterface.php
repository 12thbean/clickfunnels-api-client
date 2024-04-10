<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\v2\DTO\Fulfillment\CreateFulfillmentDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Fulfillment\FulfillmentDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Fulfillment\UpdateFulfillmentDTO;

interface FulfillmentClientInterface
{
    /**
     * List Fulfillments
     *
     * @return FulfillmentDTO[]
     * @link https://developers.myclickfunnels.com/reference/listfulfillments
     */
    public function getList(): array;

    /**
     * Fetch Fulfillment
     *
     * @link https://developers.myclickfunnels.com/reference/getfulfillments
     */
    public function getById(int $id): FulfillmentDTO;

    /**
     * Create Fulfillment
     *
     * @link https://developers.myclickfunnels.com/reference/createfulfillments
     */
    public function create(CreateFulfillmentDTO $payload): FulfillmentDTO;

    /**
     * Update Fulfillment
     *
     * @link https://developers.myclickfunnels.com/reference/updatefulfillments
     */
    public function update(int $id, UpdateFulfillmentDTO $payload): FulfillmentDTO;

    /**
     * This will cancel a Fulfillment.
     * A Fulfillment can only be cancelled when it's in a "fulfilled" state.
     * The "cancelled" state is final.
     *
     * @link https://developers.myclickfunnels.com/reference/cancelfulfillment
     */
    public function cancel(int $id): FulfillmentDTO;
}
