<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Resources\Inventory;

use SDKLimes\API\Resources\Inventory\Sim\SimSearchParams;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface SimRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SimSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function search(
        array|SimSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
