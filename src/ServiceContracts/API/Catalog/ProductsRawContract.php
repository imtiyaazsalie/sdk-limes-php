<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Catalog;

use SDKLimes\API\Catalog\Products\ProductListByCategoryParams;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface ProductsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ProductListByCategoryParams $params
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
    ): BaseResponse;
}
