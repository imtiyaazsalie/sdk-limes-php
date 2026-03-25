<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API;

use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface CatalogContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listCategories(
        ?int $limit = null,
        ?int $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
