<?php

declare(strict_types=1);

namespace SDKLimes\Services\API;

use SDKLimes\Client;
use SDKLimes\ServiceContracts\API\CRMRawContract;

final class CRMRawService implements CRMRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
