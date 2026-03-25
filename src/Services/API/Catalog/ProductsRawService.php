<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Catalog;

use SDKLimes\API\Catalog\Products\ProductListByCategoryParams;
use SDKLimes\Client;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\Catalog\ProductsRawContract;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class ProductsRawService implements ProductsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   descendants?: bool, limit?: int, page?: int
     * }|ProductListByCategoryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function listByCategory(
        string $categoryCode,
        array|ProductListByCategoryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ProductListByCategoryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/Catalog/products/category/%1$s', $categoryCode],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }
}
