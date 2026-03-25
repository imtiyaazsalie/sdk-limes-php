<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Payment;

use SDKLimes\API\Payment\DynamicServices\DynamicServiceInitializeParams;
use SDKLimes\API\Payment\DynamicServices\DynamicServiceRecurringParams;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface DynamicServicesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|DynamicServiceInitializeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function initialize(
        array|DynamicServiceInitializeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|DynamicServiceRecurringParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function recurring(
        array|DynamicServiceRecurringParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
