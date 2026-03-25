<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Catalog;

use SDKLimes\API\Catalog\Category\CategoryGetTreeParams;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface CategoryRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function retrieve(
        string $categoryID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CategoryGetTreeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getTree(
        array|CategoryGetTreeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
