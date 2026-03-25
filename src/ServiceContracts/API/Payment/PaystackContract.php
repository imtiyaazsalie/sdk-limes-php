<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Payment;

use SDKLimes\API\Payment\Paystack\PaystackVerifyParams\Metadata;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type MetadataShape from \SDKLimes\API\Payment\Paystack\PaystackVerifyParams\Metadata
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface PaystackContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cancelSubscription(
        string $msisdn,
        string $productID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function charge(
        int $amount,
        string $paymentMethodID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function initialize(
        int $amount,
        string $productID,
        ?string $msisdn = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @deprecated
     *
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function initializeCombo(
        int $amount,
        string $productID,
        ?string $msisdn = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function linkTransaction(
        string $orderID,
        string $transactionReference,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param list<string> $serviceIDs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function linkTransactionToServices(
        array $serviceIDs,
        string $transactionReference,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSubscriptions(
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveSubscription(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @deprecated
     *
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function subscribe(
        string $msisdn,
        string $paymentMethodID,
        string $productID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param Metadata|MetadataShape $metadata
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function verify(
        string $reference,
        Metadata|array|null $metadata = null,
        ?bool $saveCard = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function webhook(
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
