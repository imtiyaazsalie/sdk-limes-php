<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Resources\Inventory;

use SDKLimes\API\Resources\Inventory\Sim\SimSearchParams;
use SDKLimes\Client;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\Resources\Inventory\SimRawContract;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class SimRawService implements SimRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   id?: string,
     *   accessNo?: string,
     *   dealer?: string,
     *   imsi?: string,
     *   limit?: int,
     *   page?: int,
     *   status?: string,
     *   subStatus?: string,
     * }|SimSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function search(
        array|SimSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SimSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/Resources/inventory/sim/search',
            query: $parsed,
            options: $options,
            convert: null,
        );
    }
}
