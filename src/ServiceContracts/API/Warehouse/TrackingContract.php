<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Warehouse;

use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface TrackingContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEvents(
        string $orderID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getPod(
        string $orderID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
