<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Resources;

use SDKLimes\Client;
use SDKLimes\ServiceContracts\API\Resources\InventoryContract;
use SDKLimes\Services\API\Resources\Inventory\SimService;

final class InventoryService implements InventoryContract
{
    /**
     * @api
     */
    public InventoryRawService $raw;

    /**
     * @api
     */
    public SimService $sim;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new InventoryRawService($client);
        $this->sim = new SimService($client);
    }
}
