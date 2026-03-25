<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Subscriber;

use SDKLimes\Client;
use SDKLimes\ServiceContracts\API\Subscriber\ServiceRawContract;

final class ServiceRawService implements ServiceRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
