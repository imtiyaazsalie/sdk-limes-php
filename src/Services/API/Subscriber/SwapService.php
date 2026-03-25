<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Subscriber;

use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\Subscriber\SwapContract;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class SwapService implements SwapContract
{
    /**
     * @api
     */
    public SwapRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SwapRawService($client);
    }

    /**
     * @api
     *
     * @param string $toMsisdn Path param
     * @param string $msisdn Path param
     * @param bool $port Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function msisdn(
        string $toMsisdn,
        string $msisdn,
        bool $port = false,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['msisdn' => $msisdn, 'port' => $port]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->msisdn($toMsisdn, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
