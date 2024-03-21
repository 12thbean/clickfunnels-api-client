<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\v2\DTO\FulfillmentLocation\CreateFulfillmentLocationDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\FulfillmentLocation\FulfillmentLocationDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\FulfillmentLocation\UpdateFulfillmentLocationDTO;

interface FulfillmentLocationClientInterface
{
    /**
     * List Locations
     *
     * @return FulfillmentLocationDTO[]
     * @link https://developers.myclickfunnels.com/reference/listfulfillmentslocations
     */
    public function getList(): array;

    /**
     * Fetch Location
     *
     * @link https://developers.myclickfunnels.com/reference/getfulfillmentslocations
     */
    public function getById(int $id): FulfillmentLocationDTO;

    /**
     * Create Location
     *
     * @link https://developers.myclickfunnels.com/reference/createfulfillmentslocations
     */
    public function create(CreateFulfillmentLocationDTO $payload): FulfillmentLocationDTO;

    /**
     * Update Location
     *
     * @link https://developers.myclickfunnels.com/reference/updatefulfillmentslocations
     */
    public function update(int $id, UpdateFulfillmentLocationDTO $payload): FulfillmentLocationDTO;

    /**
     * Remove Location
     *
     * @link https://developers.myclickfunnels.com/reference/removefulfillmentslocations
     */
    public function delete(int $id): bool;
}
