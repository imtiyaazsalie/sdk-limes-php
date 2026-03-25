<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Subscriber\Service;

use SDKLimes\API\Payment\DynamicServices\DynamicServiceRequest;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type DynamicServiceRequestShape from \SDKLimes\API\Payment\DynamicServices\DynamicServiceRequest
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface DynamicContract
{
    /**
     * @api
     *
     * @param list<DynamicServiceRequest|DynamicServiceRequestShape>|null $services
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $msisdn,
        ?array $services = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
