<?php

declare(strict_types=1);

namespace SDKLimes\Services\API;

use SDKLimes\API\Order\OrderCreateParams;
use SDKLimes\API\Order\OrderCreateParams\Product;
use SDKLimes\Client;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\OrderRawContract;

/**
 * @phpstan-import-type ProductShape from \SDKLimes\API\Order\OrderCreateParams\Product
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class OrderRawService implements OrderRawContract
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
     *   msisdn?: string|null, products?: list<Product|ProductShape>|null
     * }|OrderCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function create(
        array|OrderCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OrderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/Order/create',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
