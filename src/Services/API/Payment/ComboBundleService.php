<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Payment;

use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\Payment\ComboBundleContract;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class ComboBundleService implements ComboBundleContract
{
    /**
     * @api
     */
    public ComboBundleRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ComboBundleRawService($client);
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function recurring(
        int $amount,
        string $msisdn,
        string $paymentMethodID,
        string $productID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'amount' => $amount,
                'msisdn' => $msisdn,
                'paymentMethodID' => $paymentMethodID,
                'productID' => $productID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->recurring(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
