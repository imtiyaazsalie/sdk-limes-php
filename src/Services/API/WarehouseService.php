<?php

declare(strict_types=1);

namespace SDKLimes\Services\API;

use SDKLimes\Client;
use SDKLimes\ServiceContracts\API\WarehouseContract;
use SDKLimes\Services\API\Warehouse\TrackingService;

final class WarehouseService implements WarehouseContract
{
    /**
     * @api
     */
    public WarehouseRawService $raw;

    /**
     * @api
     */
    public TrackingService $tracking;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WarehouseRawService($client);
        $this->tracking = new TrackingService($client);
    }
}
