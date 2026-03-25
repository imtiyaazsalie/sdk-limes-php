<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Subscriber;

use SDKLimes\API\Subscriber\Swap\SwapMsisdnParams;
use SDKLimes\Client;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\Subscriber\SwapRawContract;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class SwapRawService implements SwapRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param string $toMsisdn Path param
     * @param array{msisdn: string, port?: bool}|SwapMsisdnParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function msisdn(
        string $toMsisdn,
        array|SwapMsisdnParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SwapMsisdnParams::parseRequest(
            $params,
            $requestOptions,
        );
        $msisdn = $parsed['msisdn'];
        unset($parsed['msisdn']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/Subscriber/%1$s/swap/msisdn/%2$s', $msisdn, $toMsisdn],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }
}
