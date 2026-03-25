<?php

declare(strict_types=1);

namespace SDKLimes\Services\API;

use SDKLimes\Client;
use SDKLimes\ServiceContracts\API\WarehouseRawContract;

final class WarehouseRawService implements WarehouseRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
