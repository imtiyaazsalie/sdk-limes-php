<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API;

use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface AuthContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createToken(
        ?string $email = null,
        ?string $role = null,
        ?string $secret = null,
        ?string $tenant = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
