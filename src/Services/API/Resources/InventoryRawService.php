<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Resources;

use SDKLimes\Client;
use SDKLimes\ServiceContracts\API\Resources\InventoryRawContract;

final class InventoryRawService implements InventoryRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
