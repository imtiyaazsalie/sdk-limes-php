<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Order;

use SDKLimes\API\Order\Pending\PendingCreateParams;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface PendingRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PendingCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function create(
        array|PendingCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function process(
        string $msisdn,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function retrieveByMsisdn(
        string $msisdn,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
