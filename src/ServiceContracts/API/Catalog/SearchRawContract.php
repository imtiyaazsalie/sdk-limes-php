<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Catalog;

use SDKLimes\API\Catalog\Search\SearchListProductsParams;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface SearchRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SearchListProductsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function listProducts(
        array|SearchListProductsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function retrieveProduct(
        string $productID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
