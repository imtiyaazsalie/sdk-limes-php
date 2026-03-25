<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Payment;

use SDKLimes\API\Payment\ComboBundle\ComboBundleRecurringParams;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface ComboBundleRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ComboBundleRecurringParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function recurring(
        array|ComboBundleRecurringParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
