<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Subscriber;

use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface SwapContract
{
    /**
     * @api
     *
     * @param string $toMsisdn Path param
     * @param string $msisdn Path param
     * @param bool $port Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function msisdn(
        string $toMsisdn,
        string $msisdn,
        bool $port = false,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
