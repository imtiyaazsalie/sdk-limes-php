<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Subscriber\Service;

use SDKLimes\API\Payment\DynamicServices\DynamicServiceRequest;
use SDKLimes\API\Subscriber\Service\Dynamic\DynamicCreateParams;
use SDKLimes\Client;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\Subscriber\Service\DynamicRawContract;

/**
 * @phpstan-import-type DynamicServiceRequestShape from \SDKLimes\API\Payment\DynamicServices\DynamicServiceRequest
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class DynamicRawService implements DynamicRawContract
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
     *   services?: list<DynamicServiceRequest|DynamicServiceRequestShape>|null
     * }|DynamicCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function create(
        string $msisdn,
        array|DynamicCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DynamicCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/Subscriber/%1$s/service/dynamic', $msisdn],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
