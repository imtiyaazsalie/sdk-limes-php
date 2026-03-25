<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Subscriber;

use SDKLimes\Client;
use SDKLimes\ServiceContracts\API\Subscriber\ServiceContract;
use SDKLimes\Services\API\Subscriber\Service\DynamicService;

final class ServiceService implements ServiceContract
{
    /**
     * @api
     */
    public ServiceRawService $raw;

    /**
     * @api
     */
    public DynamicService $dynamic;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ServiceRawService($client);
        $this->dynamic = new DynamicService($client);
    }
}
