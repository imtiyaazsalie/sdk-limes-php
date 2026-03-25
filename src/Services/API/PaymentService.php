<?php

declare(strict_types=1);

namespace SDKLimes\Services\API;

use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\PaymentContract;
use SDKLimes\Services\API\Payment\ComboBundleService;
use SDKLimes\Services\API\Payment\DynamicServicesService;
use SDKLimes\Services\API\Payment\PaystackService;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class PaymentService implements PaymentContract
{
    /**
     * @api
     */
    public PaymentRawService $raw;

    /**
     * @api
     */
    public PaystackService $paystack;

    /**
     * @api
     */
    public DynamicServicesService $dynamicServices;

    /**
     * @api
     */
    public ComboBundleService $comboBundle;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PaymentRawService($client);
        $this->paystack = new PaystackService($client);
        $this->dynamicServices = new DynamicServicesService($client);
        $this->comboBundle = new ComboBundleService($client);
    }

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
    ): mixed {
        $params = Util::removeNulls(['limit' => $limit]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listTransactions(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        $params = Util::removeNulls(
            [
                'reason' => $reason,
                'transactionReference' => $transactionReference,
                'amountInCents' => $amountInCents,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->refund(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
