<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductVariants\CreateVariantDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductVariants\ProductVariantDTO;

interface ProductVariantClientInterface
{
    /**
     * Returns a list of product variants.
     *
     * @param int $productId
     *
     * @return ProductVariantDTO[]
     * @link https://apidocs.myclickfunnels.com/tag/Products::Variant#operation/listProductsVariants
     */
    public function getList(int $productId): array;

    /**
     * Returns a product variant by its ID.
     *
     * @param int $id
     * @link https://apidocs.myclickfunnels.com/tag/Products::Variant#operation/getProductsVariants
     */
    public function getById(int $id): ProductVariantDTO;

    /**
     * Creates new product variant.
     *
     * @param int $productId
     * @param CreateVariantDTO $payload
     *
     * @return ProductVariantDTO
     * @link https://apidocs.myclickfunnels.com/tag/Products::Variant#operation/createProductsVariants
     */
    public function create(int $productId, CreateVariantDTO $payload): ProductVariantDTO;
}
