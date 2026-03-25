<?php

declare(strict_types=1);

namespace SDKLimes\Services\API;

use SDKLimes\API\Mvnx\MvnxCreatePortParams;
use SDKLimes\API\Mvnx\MvnxCreateWebhookParams;
use SDKLimes\API\Mvnx\MvnxCreateWebhookParams\Data;
use SDKLimes\Client;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\MvnxRawContract;

/**
 * @phpstan-import-type DataShape from \SDKLimes\API\Mvnx\MvnxCreateWebhookParams\Data
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class MvnxRawService implements MvnxRawContract
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
     *   newMsisdn: string,
     *   oldMsisdn: string,
     *   portedAt?: \DateTimeInterface|null,
     *   reference?: string|null,
     * }|MvnxCreatePortParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createPort(
        array|MvnxCreatePortParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MvnxCreatePortParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/Mvnx/port',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   id?: string|null,
     *   data?: Data|DataShape,
     *   receivedOn?: \DateTimeInterface|null,
     *   sentOn?: \DateTimeInterface|null,
     *   type?: string|null,
     * }|MvnxCreateWebhookParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createWebhook(
        array|MvnxCreateWebhookParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MvnxCreateWebhookParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/Mvnx/webhook',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
