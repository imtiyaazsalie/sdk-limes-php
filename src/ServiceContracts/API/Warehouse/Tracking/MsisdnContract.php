<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Warehouse\Tracking;

use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface MsisdnContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEvents(
        string $msisdn,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
