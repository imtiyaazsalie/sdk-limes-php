<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Warehouse;

use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\Warehouse\TrackingContract;
use SDKLimes\Services\API\Warehouse\Tracking\MsisdnService;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class TrackingService implements TrackingContract
{
    /**
     * @api
     */
    public TrackingRawService $raw;

    /**
     * @api
     */
    public MsisdnService $msisdn;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TrackingRawService($client);
        $this->msisdn = new MsisdnService($client);
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEvents(
        string $orderID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEvents($orderID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getPod(
        string $orderID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getPod($orderID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
