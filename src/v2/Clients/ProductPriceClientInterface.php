<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\ProductPriceDTO;

interface ProductPriceClientInterface
{
    /**
     * Returns a list of product prices.
     *
     * @param int $productId
     *
     * @return ProductPriceDTO[]
     * @link https://apidocs.myclickfunnels.com/tag/Products::Price#operation/listProductsPrices
     */
    public function getList(int $productId): array;

    /**
     * Returns certain product price by its id.
     *
     * @param int $id
     * @return ProductPriceDTO
     * @link https://apidocs.myclickfunnels.com/tag/Products::Price#operation/getProductsPrices
     */
    public function getById(int $id): ProductPriceDTO;

    /**
     * Creates a new product price.
     *
     * @param int $productId
     * @param ProductPriceDTO $payload
     *
     * @return ProductPriceDTO
     * @link https://apidocs.myclickfunnels.com/tag/Products::Price#operation/createProductsPrices
     */
    public function create(int $productId, ProductPriceDTO $payload): ProductPriceDTO;
}
