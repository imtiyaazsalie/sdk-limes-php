<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Payment;

use SDKLimes\API\Payment\DynamicServices\DynamicServiceRequest;
use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\Payment\DynamicServicesContract;

/**
 * @phpstan-import-type DynamicServiceRequestShape from \SDKLimes\API\Payment\DynamicServices\DynamicServiceRequest
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class DynamicServicesService implements DynamicServicesContract
{
    /**
     * @api
     */
    public DynamicServicesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DynamicServicesRawService($client);
    }

    /**
     * @api
     *
     * @param list<DynamicServiceRequest|DynamicServiceRequestShape> $services
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function initialize(
        array $services,
        ?string $msisdn = null,
        ?int $shippingCostInCents = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'services' => $services,
                'msisdn' => $msisdn,
                'shippingCostInCents' => $shippingCostInCents,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->initialize(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param list<DynamicServiceRequest|DynamicServiceRequestShape> $services
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function recurring(
        string $msisdn,
        string $paymentMethodID,
        array $services,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'msisdn' => $msisdn,
                'paymentMethodID' => $paymentMethodID,
                'services' => $services,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->recurring(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
