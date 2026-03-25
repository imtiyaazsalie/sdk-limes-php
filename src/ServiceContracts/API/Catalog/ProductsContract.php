<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Catalog;

use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface ProductsContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listByCategory(
        string $categoryCode,
        ?bool $descendants = null,
        ?int $limit = null,
        ?int $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
