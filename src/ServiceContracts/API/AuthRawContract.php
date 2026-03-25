<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API;

use SDKLimes\API\Auth\AuthCreateTokenParams;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface AuthRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AuthCreateTokenParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createToken(
        array|AuthCreateTokenParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
