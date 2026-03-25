<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Subscriber\Service\Dynamic;

use SDKLimes\API\Subscriber\Service\Dynamic\Pending\PendingCreateParams;
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
        string $msisdn,
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
    public function list(
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
    public function process(
        string $msisdn,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
