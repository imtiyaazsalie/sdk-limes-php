<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Warehouse\Tracking;

use SDKLimes\Client;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\Warehouse\Tracking\MsisdnRawContract;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class MsisdnRawService implements MsisdnRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getEvents(
        string $msisdn,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/Warehouse/tracking/msisdn/%1$s/events', $msisdn],
            options: $requestOptions,
            convert: null,
        );
    }
}
