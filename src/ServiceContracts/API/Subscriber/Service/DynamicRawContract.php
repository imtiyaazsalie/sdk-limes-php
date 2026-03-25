<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Subscriber\Service;

use SDKLimes\API\Subscriber\Service\Dynamic\DynamicCreateParams;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface DynamicRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|DynamicCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function create(
        string $msisdn,
        array|DynamicCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
