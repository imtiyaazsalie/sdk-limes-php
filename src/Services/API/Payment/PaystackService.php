<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Payment;

use SDKLimes\API\Payment\Paystack\PaystackVerifyParams\Metadata;
use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\Payment\PaystackContract;
use SDKLimes\Services\API\Payment\Paystack\CardsService;

/**
 * @phpstan-import-type MetadataShape from \SDKLimes\API\Payment\Paystack\PaystackVerifyParams\Metadata
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class PaystackService implements PaystackContract
{
    /**
     * @api
     */
    public PaystackRawService $raw;

    /**
     * @api
     */
    public CardsService $cards;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PaystackRawService($client);
        $this->cards = new CardsService($client);
    }

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
    ): mixed {
        $params = Util::removeNulls(
            ['msisdn' => $msisdn, 'productID' => $productID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cancelSubscription(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        $params = Util::removeNulls(
            ['amount' => $amount, 'paymentMethodID' => $paymentMethodID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->charge(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        $params = Util::removeNulls(
            ['amount' => $amount, 'productID' => $productID, 'msisdn' => $msisdn]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->initialize(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        $params = Util::removeNulls(
            ['amount' => $amount, 'productID' => $productID, 'msisdn' => $msisdn]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->initializeCombo(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        $params = Util::removeNulls(
            ['orderID' => $orderID, 'transactionReference' => $transactionReference]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->linkTransaction(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        $params = Util::removeNulls(
            [
                'serviceIDs' => $serviceIDs,
                'transactionReference' => $transactionReference,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->linkTransactionToServices(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSubscriptions(
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listSubscriptions(requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveSubscription($id, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        $params = Util::removeNulls(
            [
                'msisdn' => $msisdn,
                'paymentMethodID' => $paymentMethodID,
                'productID' => $productID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->subscribe(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        $params = Util::removeNulls(
            [
                'reference' => $reference,
                'metadata' => $metadata,
                'saveCard' => $saveCard,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->verify(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function webhook(
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->webhook(requestOptions: $requestOptions);

        return $response->parse();
    }
}
