<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Warehouse\Tracking;

use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\Warehouse\Tracking\MsisdnContract;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class MsisdnService implements MsisdnContract
{
    /**
     * @api
     */
    public MsisdnRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MsisdnRawService($client);
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEvents(
        string $msisdn,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEvents($msisdn, requestOptions: $requestOptions);

        return $response->parse();
    }
}
