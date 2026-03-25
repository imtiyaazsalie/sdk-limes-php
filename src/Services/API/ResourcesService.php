<?php

declare(strict_types=1);

namespace SDKLimes\Services\API;

use SDKLimes\Client;
use SDKLimes\ServiceContracts\API\ResourcesContract;
use SDKLimes\Services\API\Resources\InventoryService;

final class ResourcesService implements ResourcesContract
{
    /**
     * @api
     */
    public ResourcesRawService $raw;

    /**
     * @api
     */
    public InventoryService $inventory;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ResourcesRawService($client);
        $this->inventory = new InventoryService($client);
    }
}
