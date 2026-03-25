<?php

declare(strict_types=1);

namespace SDKLimes\Services;

use SDKLimes\Client;
use SDKLimes\ServiceContracts\APIContract;
use SDKLimes\Services\API\AuthService;
use SDKLimes\Services\API\CatalogService;
use SDKLimes\Services\API\CRMService;
use SDKLimes\Services\API\MvnxService;
use SDKLimes\Services\API\OrderService;
use SDKLimes\Services\API\PaymentService;
use SDKLimes\Services\API\ResourcesService;
use SDKLimes\Services\API\RicaService;
use SDKLimes\Services\API\SubscriberService;
use SDKLimes\Services\API\UserService;
use SDKLimes\Services\API\WarehouseService;

final class APIService implements APIContract
{
    /**
     * @api
     */
    public APIRawService $raw;

    /**
     * @api
     */
    public AuthService $auth;

    /**
     * @api
     */
    public CatalogService $catalog;

    /**
     * @api
     */
    public CRMService $crm;

    /**
     * @api
     */
    public MvnxService $mvnx;

    /**
     * @api
     */
    public OrderService $order;

    /**
     * @api
     */
    public PaymentService $payment;

    /**
     * @api
     */
    public ResourcesService $resources;

    /**
     * @api
     */
    public RicaService $rica;

    /**
     * @api
     */
    public SubscriberService $subscriber;

    /**
     * @api
     */
    public UserService $user;

    /**
     * @api
     */
    public WarehouseService $warehouse;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new APIRawService($client);
        $this->auth = new AuthService($client);
        $this->catalog = new CatalogService($client);
        $this->crm = new CRMService($client);
        $this->mvnx = new MvnxService($client);
        $this->order = new OrderService($client);
        $this->payment = new PaymentService($client);
        $this->resources = new ResourcesService($client);
        $this->rica = new RicaService($client);
        $this->subscriber = new SubscriberService($client);
        $this->user = new UserService($client);
        $this->warehouse = new WarehouseService($client);
    }
}
