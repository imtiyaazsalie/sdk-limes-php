<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Payment;

use SDKLimes\API\Payment\ComboBundle\ComboBundleRecurringParams;
use SDKLimes\Client;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\Payment\ComboBundleRawContract;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class ComboBundleRawService implements ComboBundleRawContract
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
     *   amount: int, msisdn: string, paymentMethodID: string, productID: string
     * }|ComboBundleRecurringParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function recurring(
        array|ComboBundleRecurringParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ComboBundleRecurringParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/Payment/combo-bundle/recurring',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
