<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\CRM;

use SDKLimes\Client;
use SDKLimes\ServiceContracts\API\CRM\StoreContract;
use SDKLimes\Services\API\CRM\Store\AccountService;

final class StoreService implements StoreContract
{
    /**
     * @api
     */
    public StoreRawService $raw;

    /**
     * @api
     */
    public AccountService $account;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new StoreRawService($client);
        $this->account = new AccountService($client);
    }
}
