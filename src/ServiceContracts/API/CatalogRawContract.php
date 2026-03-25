<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API;

use SDKLimes\API\Catalog\CatalogListCategoriesParams;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface CatalogRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CatalogListCategoriesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function listCategories(
        array|CatalogListCategoriesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
