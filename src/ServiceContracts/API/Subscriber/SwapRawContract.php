<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Subscriber;

use SDKLimes\API\Subscriber\Swap\SwapMsisdnParams;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface SwapRawContract
{
    /**
     * @api
     *
     * @param string $toMsisdn Path param
     * @param array<string,mixed>|SwapMsisdnParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function msisdn(
        string $toMsisdn,
        array|SwapMsisdnParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
