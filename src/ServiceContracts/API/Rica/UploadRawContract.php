<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Rica;

use SDKLimes\API\Rica\Upload\UploadUploadIDParams;
use SDKLimes\API\Rica\Upload\UploadUploadPoaParams;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface UploadRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|UploadUploadIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function uploadID(
        array|UploadUploadIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|UploadUploadPoaParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function uploadPoa(
        array|UploadUploadPoaParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
