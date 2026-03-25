<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API;

use SDKLimes\API\Payment\PaymentListTransactionsParams;
use SDKLimes\API\Payment\PaymentRefundParams;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface PaymentRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PaymentListTransactionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function listTransactions(
        array|PaymentListTransactionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PaymentRefundParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function refund(
        array|PaymentRefundParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
