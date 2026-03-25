<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API;

use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface PaymentContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listTransactions(
        ?int $limit = null,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function refund(
        string $reason,
        string $transactionReference,
        ?int $amountInCents = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
