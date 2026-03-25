<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Catalog;

use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface CategoryContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $categoryID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getTree(
        ?string $groupCode = null,
        bool $groupOnly = false,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
