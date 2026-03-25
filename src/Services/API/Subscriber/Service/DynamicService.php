<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Subscriber\Service;

use SDKLimes\API\Payment\DynamicServices\DynamicServiceRequest;
use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\Subscriber\Service\DynamicContract;
use SDKLimes\Services\API\Subscriber\Service\Dynamic\PendingService;

/**
 * @phpstan-import-type DynamicServiceRequestShape from \SDKLimes\API\Payment\DynamicServices\DynamicServiceRequest
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class DynamicService implements DynamicContract
{
    /**
     * @api
     */
    public DynamicRawService $raw;

    /**
     * @api
     */
    public PendingService $pending;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DynamicRawService($client);
        $this->pending = new PendingService($client);
    }

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
    ): mixed {
        $params = Util::removeNulls(['services' => $services]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($msisdn, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
