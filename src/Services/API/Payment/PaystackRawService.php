<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Payment;

use SDKLimes\API\Payment\Paystack\PaystackCancelSubscriptionParams;
use SDKLimes\API\Payment\Paystack\PaystackChargeParams;
use SDKLimes\API\Payment\Paystack\PaystackInitializeComboParams;
use SDKLimes\API\Payment\Paystack\PaystackInitializeParams;
use SDKLimes\API\Payment\Paystack\PaystackLinkTransactionParams;
use SDKLimes\API\Payment\Paystack\PaystackLinkTransactionToServicesParams;
use SDKLimes\API\Payment\Paystack\PaystackSubscribeParams;
use SDKLimes\API\Payment\Paystack\PaystackVerifyParams;
use SDKLimes\API\Payment\Paystack\PaystackVerifyParams\Metadata;
use SDKLimes\Client;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\Payment\PaystackRawContract;

/**
 * @phpstan-import-type MetadataShape from \SDKLimes\API\Payment\Paystack\PaystackVerifyParams\Metadata
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class PaystackRawService implements PaystackRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   msisdn: string, productID: string
     * }|PaystackCancelSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function cancelSubscription(
        array|PaystackCancelSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PaystackCancelSubscriptionParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/Payment/paystack/cancel-subscription',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{amount: int, paymentMethodID: string}|PaystackChargeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function charge(
        array|PaystackChargeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PaystackChargeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/Payment/paystack/charge',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   amount: int, productID: string, msisdn?: string|null
     * }|PaystackInitializeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function initialize(
        array|PaystackInitializeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PaystackInitializeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/Payment/paystack/initialize',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @deprecated
     *
     * @api
     *
     * @param array{
     *   amount: int, productID: string, msisdn?: string|null
     * }|PaystackInitializeComboParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function initializeCombo(
        array|PaystackInitializeComboParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PaystackInitializeComboParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/Payment/paystack/initialize-combo',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   orderID: string, transactionReference: string
     * }|PaystackLinkTransactionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function linkTransaction(
        array|PaystackLinkTransactionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PaystackLinkTransactionParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/Payment/paystack/link-transaction',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   serviceIDs: list<string>, transactionReference: string
     * }|PaystackLinkTransactionToServicesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function linkTransactionToServices(
        array|PaystackLinkTransactionToServicesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PaystackLinkTransactionToServicesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/Payment/paystack/link-transaction-to-services',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function listSubscriptions(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/Payment/paystack/subscriptions',
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function retrieveSubscription(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/Payment/paystack/subscription/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @deprecated
     *
     * @api
     *
     * @param array{
     *   msisdn: string, paymentMethodID: string, productID: string
     * }|PaystackSubscribeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function subscribe(
        array|PaystackSubscribeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PaystackSubscribeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/Payment/paystack/subscribe',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   reference: string, metadata?: Metadata|MetadataShape, saveCard?: bool
     * }|PaystackVerifyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function verify(
        array|PaystackVerifyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PaystackVerifyParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/Payment/paystack/verify',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function webhook(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/Payment/paystack/webhook',
            options: $requestOptions,
            convert: null,
        );
    }
}
