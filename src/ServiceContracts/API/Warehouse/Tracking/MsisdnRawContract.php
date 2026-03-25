<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Warehouse\Tracking;

use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface MsisdnRawContract
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
    public function getEvents(
        string $msisdn,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
