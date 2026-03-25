<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API;

use SDKLimes\API\Mvnx\MvnxCreatePortParams;
use SDKLimes\API\Mvnx\MvnxCreateWebhookParams;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface MvnxRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MvnxCreatePortParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createPort(
        array|MvnxCreatePortParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MvnxCreateWebhookParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createWebhook(
        array|MvnxCreateWebhookParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
