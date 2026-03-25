<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\CRM;

use SDKLimes\Client;
use SDKLimes\ServiceContracts\API\CRM\AccountContract;
use SDKLimes\Services\API\CRM\Account\CustomerService;

final class AccountService implements AccountContract
{
    /**
     * @api
     */
    public AccountRawService $raw;

    /**
     * @api
     */
    public CustomerService $customer;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AccountRawService($client);
        $this->customer = new CustomerService($client);
    }
}
