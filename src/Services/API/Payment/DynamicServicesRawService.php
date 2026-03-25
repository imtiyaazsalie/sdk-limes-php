<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Payment;

use SDKLimes\API\Payment\DynamicServices\DynamicServiceInitializeParams;
use SDKLimes\API\Payment\DynamicServices\DynamicServiceRecurringParams;
use SDKLimes\API\Payment\DynamicServices\DynamicServiceRequest;
use SDKLimes\Client;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\Payment\DynamicServicesRawContract;

/**
 * @phpstan-import-type DynamicServiceRequestShape from \SDKLimes\API\Payment\DynamicServices\DynamicServiceRequest
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class DynamicServicesRawService implements DynamicServicesRawContract
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
     *   services: list<DynamicServiceRequest|DynamicServiceRequestShape>,
     *   msisdn?: string|null,
     *   shippingCostInCents?: int|null,
     * }|DynamicServiceInitializeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function initialize(
        array|DynamicServiceInitializeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DynamicServiceInitializeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/Payment/dynamic-services/initialize',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   msisdn: string,
     *   paymentMethodID: string,
     *   services: list<DynamicServiceRequest|DynamicServiceRequestShape>,
     * }|DynamicServiceRecurringParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function recurring(
        array|DynamicServiceRecurringParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DynamicServiceRecurringParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/Payment/dynamic-services/recurring',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
