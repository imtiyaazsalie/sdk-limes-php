<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Payment;

use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface ComboBundleContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function recurring(
        int $amount,
        string $msisdn,
        string $paymentMethodID,
        string $productID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
