<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Payment;

use SDKLimes\API\Payment\DynamicServices\DynamicServiceRequest;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type DynamicServiceRequestShape from \SDKLimes\API\Payment\DynamicServices\DynamicServiceRequest
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface DynamicServicesContract
{
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
    ): mixed;

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
    ): mixed;
}
