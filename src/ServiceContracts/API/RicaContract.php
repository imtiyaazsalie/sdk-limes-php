<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API;

use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface RicaContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveDocument(
        string $type,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
