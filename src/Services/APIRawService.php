<?php

declare(strict_types=1);

namespace SDKLimes\Services;

use SDKLimes\Client;
use SDKLimes\ServiceContracts\APIRawContract;

final class APIRawService implements APIRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
