<?php

declare(strict_types=1);

namespace SDKLimes\Services\API;

use SDKLimes\Client;
use SDKLimes\ServiceContracts\API\CRMContract;
use SDKLimes\Services\API\CRM\AccountService;
use SDKLimes\Services\API\CRM\CreateService;
use SDKLimes\Services\API\CRM\SearchService;
use SDKLimes\Services\API\CRM\StoreService;
use SDKLimes\Services\API\CRM\UpdateService;

final class CRMService implements CRMContract
{
    /**
     * @api
     */
    public CRMRawService $raw;

    /**
     * @api
     */
    public SearchService $search;

    /**
     * @api
     */
    public CreateService $create;

    /**
     * @api
     */
    public StoreService $store;

    /**
     * @api
     */
    public AccountService $account;

    /**
     * @api
     */
    public UpdateService $update;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CRMRawService($client);
        $this->search = new SearchService($client);
        $this->create = new CreateService($client);
        $this->store = new StoreService($client);
        $this->account = new AccountService($client);
        $this->update = new UpdateService($client);
    }
}
