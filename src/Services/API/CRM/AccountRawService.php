<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\CRM;

use SDKLimes\Client;
use SDKLimes\ServiceContracts\API\CRM\AccountRawContract;

final class AccountRawService implements AccountRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
